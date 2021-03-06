<?php
/**
 * Register options pages (ACF) and provide functions to do stuff with options.
 * ACF options pages are stored in wp_options.
 */
namespace Vincit\Options;

if (function_exists("acf_add_options_page")) {
  $parent = acf_add_options_page([
    "page_title" => "Options Page",
    "menu_slug" => "acf-opts",
  ]);


  if (function_exists("pll_languages_list")) {
    acf_add_options_page("Translatable strings");

    $names = pll_languages_list([
      "fields" => "name",
    ]);

    foreach ($names as $name) {
      $fields = [
        "page_title" => $name,
        "menu_title" => $name,
        "parent_slug" => $parent["menu_slug"],
      ];

      if ($name === "English") {
        $fields["menu_slug"] = "acf-options";
      }

      acf_add_options_sub_page($fields);
    }

    /**
     * Get ACF option in the current language.
     *
     * @param string $key
     */
    function get($key) {
      $lang = pll_current_language();
      return get_field("{$lang}_{$key}", "options");
    }
  } else {
    /**
     * Fallback function if site isn't multilingual. Change $lang to your language.
     *
     * @param string $key
     */
    function get($key) {
      $lang = 'fi';
      return get_field("{$lang}_{$key}", "options");
    }
  }
} else {
  /**
   * Fallback if there's no ACF.
   *
   */
  function get() {
    return "This feature requires Advanced Custom Fields Pro.";
  }
}

