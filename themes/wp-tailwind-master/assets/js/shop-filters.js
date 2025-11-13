(function() {

    // kontener na produkty
    const container = document.getElementById('products-and-pagination');
    if (!container) return;

    /**
     * Parsuje aktualny URL i zwraca obiekt:
     * {
     *   pa_rozmiar: ['m','l'],
     *   pa_kolor: ['czarny']
     * }
     */
    function getCurrentFiltersFromLocation(urlString) {
        const url = new URL(urlString || window.location.href);
        const out = {};

        url.searchParams.forEach((val, key) => {
            if (key === 'post_type' || key === 'paged') return;
            // może być "m,l,xl" albo "m"
            const parts = val.split(',').map(v => v.trim()).filter(Boolean);
            if (parts.length) {
                out[key] = parts;
            }
        });

        return out;
    }

    /**
     * Koloruje / ustawia "ptaszki" w sidebarze wg aktualnego URL-a
     */
    function refreshSidebarFromUrl(urlString) {
        const filters = getCurrentFiltersFromLocation(urlString);
        const sidebar = document.getElementById('shop-filters');
        if (!sidebar) return;

        // wszystkie linki w sidebarze, które mają jakiś query
        const links = sidebar.querySelectorAll('a[href]');

        links.forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;

            const linkUrl = new URL(href, window.location.origin);
            let tax = null, slug = null;

            // z linku bierzemy PIERWSZY parametr nie-będący post_type
            for (const [k, v] of linkUrl.searchParams.entries()) {
                if (k === 'post_type') continue;
                tax = k;
                slug = v;
                break;
            }

            // element "checkboxa" w linku
            const box = link.querySelector('.filter-check');

            if (!tax || !slug || !box) {
                // link typu "Wyczyść filtry" itp.
                box?.classList.remove('bg-primary-100','text-white','border-primary-100','shadow-2xl');
                return;
            }

            const activeValues = filters[tax] || [];
            const isActive = activeValues.includes(slug);

            if (isActive) {
                box.classList.remove('bg-white','text-transparent','shadow-inner');
                box.classList.add('bg-primary-100','text-white','border-primary-100','shadow-2xl');
                box.textContent = '✓';
            } else {
                box.classList.add('bg-white','text-transparent','shadow-inner');
                box.classList.remove('bg-primary-100','text-white','border-primary-100','shadow-2xl');
                box.innerHTML = '&nbsp;';
            }
        });
    }

    /**
     * Ładuje partial z produktami i podmienia
     */
    async function loadProductsAndReplace(nextUrl) {
        const ajaxUrl = nextUrl + (nextUrl.includes('?') ? '&' : '?') + 'ajax_products=1';

        const res = await fetch(ajaxUrl, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        if (!res.ok) {
            console.warn('Błąd ładowania produktów', res.status, res.statusText);
            return;
        }

        const html = await res.text();
        container.innerHTML = html;

        // aktualizujemy URL w pasku
        window.history.pushState({}, '', nextUrl);

        // i DOM-owo zaznaczamy filtry
        refreshSidebarFromUrl(nextUrl);
    }

    /**
     * Paginacja
     */
    document.addEventListener('click', function(e) {
        const pageLink = e.target.closest('.woocommerce-pagination a, .custom-pagination a');
        if (pageLink) {
            e.preventDefault();
            const nextUrl = pageLink.getAttribute('href');
            if (nextUrl) {
                loadProductsAndReplace(nextUrl);
            }
            return;
        }
    });

    /**
     * Kliki w filtry w ASIDE
     * (Tu robimy TOGGLE po stronie JS, żeby zadziałał multiselect bez przeładowywania sidebaru)
     */
    document.addEventListener('click', function(e) {
        const filterLink = e.target.closest('aside a');
        if (!filterLink) return;

        const href = filterLink.getAttribute('href');
        if (!href) return;


        if (filterLink.closest('.shop-clear-filters')) {
            e.preventDefault();
            const baseUrl = new URL(window.location.origin);

            if (!baseUrl.searchParams.get('post_type')) {
                baseUrl.searchParams.set('post_type', 'product');
            }

            loadProductsAndReplace(baseUrl.toString());
            return;
        }


        e.preventDefault();

        // 1. z klikniętego linku wyciągamy taksonomię i slug
        const lurl = new URL(href, window.location.origin);
        let clickedTax = null;
        let clickedSlug = null;

        for (const [k, v] of lurl.searchParams.entries()) {
            if (k === 'post_type') continue;
            clickedTax = k;
            clickedSlug = v;
            break;
        }

        if (!clickedTax || !clickedSlug) {
            // nie udało się rozpoznać – jedziemy po prostu na href
            loadProductsAndReplace(href);
            return;
        }

        // 2. bierzemy AKTUALNY adres z paska
        const current = new URL(window.location.href);

        // zadbajmy o post_type=product
        if (lurl.searchParams.get('post_type') && !current.searchParams.get('post_type')) {
            current.searchParams.set('post_type', lurl.searchParams.get('post_type'));
        }

        // 3. aktualne wartości tej taksonomii
        const currentVal = current.searchParams.get(clickedTax);
        let values = currentVal ? currentVal.split(',').map(v => v.trim()).filter(Boolean) : [];

        // 4. toggle
        if (values.includes(clickedSlug)) {
            values = values.filter(v => v !== clickedSlug);
        } else {
            values.push(clickedSlug);
        }

        // 5. ustawiamy z powrotem
        if (values.length) {
            current.searchParams.set(clickedTax, values.join(','));
        } else {
            current.searchParams.delete(clickedTax);
        }

        // 6. usuń paginację z końca ścieżki
        current.pathname = current.pathname.replace(/\/page\/\d+\/?$/, '');

        // 7. ładujemy ajaxem
        loadProductsAndReplace(current.toString());
    });

    /**
     * Formularz (jeśli kiedyś wrzucisz inputy)
     */
    const sidebarForm = document.getElementById('shop-filters');
    if (sidebarForm) {
        sidebarForm.addEventListener('change', function() {
            const formData = new FormData(sidebarForm);
            const rawParams = {};

            for (const [key, val] of formData.entries()) {
                const cleanKey = key.endsWith('[]') ? key.replace('[]', '') : key;
                if (!rawParams[cleanKey]) rawParams[cleanKey] = [];
                if (val !== '') rawParams[cleanKey].push(val);
            }

            const params = new URLSearchParams();
            Object.entries(rawParams).forEach(([key, values]) => {
                if (values.length === 1) {
                    params.set(key, values[0]);
                } else if (values.length > 1) {
                    params.set(key, values.join(','));
                }
            });

            const base = window.location.pathname.replace(/\/page\/\d+\/?$/, '');
            const qs   = params.toString();
            const nextUrl = qs ? (base + '?' + qs) : base;

            loadProductsAndReplace(nextUrl);
        });
    }

    /**
     * Wstecz / przód
     */
    window.addEventListener('popstate', function() {
        const currentUrl = window.location.href;
        loadProductsAndReplace(currentUrl);
    });

    // startowe zaznaczenie po pierwszym wejściu
    refreshSidebarFromUrl(window.location.href);

})();
