<?php
/* ======================
   HELPERS  
   ====================== */

/**
 * Pobiera wartości danego parametru z $_GET i ZAWSZE zwraca tablicę
 * Obsługuje:
 * - ?pa_rozmiar=m         -> ['m']
 * - ?pa_rozmiar=m,l,xl    -> ['m','l','xl']
 * - ?pa_rozmiar[]=m&...   -> ['m', ...]
 */
if ( ! function_exists('pf_get_param_values') ) {
    function pf_get_param_values( $taxonomy ) {
        if ( empty($_GET[$taxonomy]) ) {
            return [];
        }

        $raw = $_GET[$taxonomy];

        // jeśli to już jest tablica z formularza (?pa_rozmiar[]=m&pa_rozmiar[]=l)
        if ( is_array($raw) ) {
            // spłaszcz i usuń puste
            $vals = [];
            foreach ( $raw as $v ) {
                if ( $v === '' || $v === null ) {
                    continue;
                }
                // jeśli ktoś podał "m,l" w jednym elemencie tablicy, też to rozbijemy
                $parts = array_map('trim', explode(',', $v));
                foreach ( $parts as $p ) {
                    if ( $p !== '' ) {
                        $vals[] = $p;
                    }
                }
            }
            return array_values(array_unique($vals));
        }

        // w przeciwnym razie to string, np. "m,l,xl" albo "m"
        $parts = array_map('trim', explode(',', $raw));
        $parts = array_filter($parts, function($v) { return $v !== ''; });

        return array_values(array_unique($parts));
    }
}

if ( ! function_exists( 'pf_get_current_product_ids' ) ) {
    function pf_get_current_product_ids() {
        static $cached = null;

        if ( $cached !== null ) {
            return $cached;
        }

        $cached = [];

        global $wp_query;

        if ( ! is_a( $wp_query, 'WP_Query' ) ) {
            return $cached;
        }

        if ( empty( $wp_query->posts ) ) {
            return $cached;
        }

        foreach ( $wp_query->posts as $post ) {
            if ( is_object( $post ) && isset( $post->post_type ) && $post->post_type === 'product' ) {
                $cached[] = (int) $post->ID;
            }
        }

        $cached = array_values( array_unique( array_filter( $cached ) ) );

        return $cached;
    }
}

/**
 * Czy dany term jest aktywny (np. ?pa_rozmiar=m,l,xl)
 */
if (!function_exists('pf_term_is_active')) {
    function pf_term_is_active($taxonomy, $slug) {
        $vals = pf_get_param_values($taxonomy);
        return in_array($slug, $vals, true);
    }
}

if ( ! function_exists( 'pf_get_available_tax_terms' ) ) {
    function pf_get_available_tax_terms( $taxonomy ) {
        if ( ! taxonomy_exists( $taxonomy ) ) {
            return [];
        }

        $terms_map   = [];
        $product_ids = pf_get_current_product_ids();

        if ( ! empty( $product_ids ) ) {
            $raw_terms = wp_get_object_terms( $product_ids, $taxonomy, [
                'orderby' => 'name',
                'order'   => 'ASC',
            ] );

            if ( is_wp_error( $raw_terms ) ) {
                $raw_terms = [];
            }
        } else {
            $raw_terms = get_terms([
                'taxonomy'   => $taxonomy,
                'hide_empty' => true,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ]);

            if ( is_wp_error( $raw_terms ) ) {
                $raw_terms = [];
            }
        }

        foreach ( $raw_terms as $term ) {
            if ( ! isset( $terms_map[ $term->slug ] ) ) {
                $terms_map[ $term->slug ] = $term;
            }
        }

        $active_slugs = pf_get_param_values( $taxonomy );

        if ( empty( $active_slugs ) ) {
            $legacy_key = '';

            if ( $taxonomy === 'product_brand' ) {
                $legacy_key = 'brand';
            } elseif ( $taxonomy === 'pa_rozmiar' ) {
                $legacy_key = 'rozmiar';
            }

            if ( $legacy_key && ! empty( $_GET[ $legacy_key ] ) ) {
                $legacy_raw = $_GET[ $legacy_key ];
                $legacy_vals = is_array( $legacy_raw )
                    ? $legacy_raw
                    : explode( ',', $legacy_raw );

                foreach ( $legacy_vals as $legacy_val ) {
                    $legacy_val = sanitize_text_field( $legacy_val );
                    if ( $legacy_val !== '' ) {
                        $active_slugs[] = $legacy_val;
                    }
                }

                $active_slugs = array_values( array_unique( $active_slugs ) );
            }
        }

        if ( ! empty( $active_slugs ) ) {
            foreach ( $active_slugs as $slug ) {
                if ( isset( $terms_map[ $slug ] ) ) {
                    continue;
                }

                $term = get_term_by( 'slug', $slug, $taxonomy );
                if ( $term && ! is_wp_error( $term ) ) {
                    $terms_map[ $slug ] = $term;
                }
            }
        }

        if ( empty( $terms_map ) ) {
            return [];
        }

        $terms = array_values( $terms_map );

        usort( $terms, function ( $a, $b ) {
            return strcasecmp( $a->name, $b->name );
        } );

        return $terms;
    }
}

/**
 * Buduje URL po kliknięciu w "checkbox linkowy"
 * MULTISELECT w obrębie jednej taksonomii.
 *
 * Przykład:
 *  - było  ?pa_rozmiar=m,l
 *  - klik  xl
 *  - będzie ?pa_rozmiar=m,l,xl
 *
 *  - było  ?pa_rozmiar=m,l,xl
 *  - klik  l
 *  - będzie ?pa_rozmiar=m,xl
 */
if (!function_exists('pf_build_filter_url')) {
    function pf_build_filter_url( $taxonomy, $term_slug ) {
        // aktualne parametry
        $params = $_GET;

        // obecne wartości tej taksonomii
        $current_vals = pf_get_param_values( $taxonomy );

        if ( in_array($term_slug, $current_vals, true) ) {
            // usuń jeśli był
            $current_vals = array_values( array_diff( $current_vals, [ $term_slug ] ) );
        } else {
            // dodaj jeśli nie było
            $current_vals[] = $term_slug;
        }

        if ( ! empty($current_vals) ) {
            // składamy w CSV (jak w Twoim JS)
            $params[$taxonomy] = implode(',', $current_vals);
        } else {
            unset($params[$taxonomy]);
        }

        // baza: aktualna kategoria (jeśli jesteśmy w kategorii) albo /shop
        $base_url = get_post_type_archive_link('product');
        if ( is_product_taxonomy() ) {
            $base_url = get_term_link(get_queried_object());
        }

        // zbuduj URL z parametrami
        $url = add_query_arg( $params, $base_url );

        return esc_url( $url );
    }
}

/**
 * Render listy termów (checkboxy wyglądające jak u Ciebie)
 */
if (!function_exists('pf_render_tax_filter_terms')) {
    function pf_render_tax_filter_terms( $taxonomy ) {
        $terms = pf_get_available_tax_terms( $taxonomy );

        if ( empty($terms) ) {
            return false; // nic do pokazania
        }

        echo '<ul class="ml-2 space-y-1">';
        foreach ($terms as $term) {
            $active = pf_term_is_active($taxonomy, $term->slug);
            $url    = pf_build_filter_url($taxonomy, $term->slug);

            echo '<li class="flex items-start">';
            echo '  <a href="'. $url .'" class="flex items-start group w-full" data-tax="'.$taxonomy.'" data-slug="'.esc_attr($term->slug).'">';

            // "checkbox"
            echo '      <span class="filter-check mr-3 mt-0.5 w-6 h-6 rounded-md border border-gray-300 flex items-center justify-center text-[10px] leading-none transition-all duration-200 ';
            echo            ($active
                                ? 'bg-primary-100 text-white border-primary-100 shadow-2xl'
                                : 'bg-white text-transparent shadow-inner');
            echo        '">';
            echo            ($active ? '✓' : '&nbsp;');
            echo '      </span>';

            // etykieta
            echo '      <span class="filter-label text-sm text-black font-medium group-hover:text-primary-100 transition-colors duration-200">';
            echo            esc_html($term->name);
            echo '      </span>';

            echo '  </a>';
            echo '</li>';
        }
        echo '</ul>';

        return true;
    }
}

/**
 * Render całej sekcji taksonomii
 */
if (!function_exists('pf_render_tax_block')) {
    function pf_render_tax_block( $taxonomy, $label ) {
        ob_start();
        $has_terms = pf_render_tax_filter_terms( $taxonomy );
        $terms_html = ob_get_clean();

        if ( ! $has_terms ) {
            return false;
        }

        echo '<div class="mb-8">';
        echo '  <div class="mb-4 text-[11px] font-semibold tracking-wide text-black uppercase">';
        echo        esc_html($label);
        echo '  </div>';
        echo        $terms_html;
        echo '</div>';

        return true;
    }
}

/**
 * Pobiera wszystkie "sensowne" taksonomie produktu
 */
if (!function_exists('pf_get_filter_taxonomies')) {
    function pf_get_filter_taxonomies() {
        $taxonomies = [];

        $manufacturer_candidates = [ 'product_brand', 'pa_producent', 'pa_marka', 'pa_producer', 'pa_brand' ];
        $manufacturer_slug       = '';

        foreach ( $manufacturer_candidates as $candidate ) {
            if ( taxonomy_exists( $candidate ) ) {
                $manufacturer_slug = $candidate;
                break;
            }
        }

        if ( $manufacturer_slug !== '' ) {
            $taxonomies[ $manufacturer_slug ] = __( 'Producent', 'yourtheme' );
        }

        $size_candidates = [ 'pa_rozmiar', 'pa_size' ];
        $size_slug       = '';

        foreach ( $size_candidates as $candidate ) {
            if ( taxonomy_exists( $candidate ) ) {
                $size_slug = $candidate;
                break;
            }
        }

        if ( $size_slug !== '' ) {
            $taxonomies[ $size_slug ] = __( 'Rozmiar', 'yourtheme' );
        }

        return apply_filters( 'pf_filter_taxonomies', $taxonomies );
    }
}
