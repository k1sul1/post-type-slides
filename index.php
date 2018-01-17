<?php
/*
Plugin name: Post type: Slides
Author: Christian Nikkanen
Author URI: http://kisu.li
*/

add_action("init", function() {
  register_post_type("slides", [
    "label" => "Slides",
    "labels" => [],
    "public" => true,
    "has_archive" => true,
    "hierarchical" => true,
    "show_in_rest" => true,
    "supports" => [
      "title",
      "editor",
      "thumbnail",
      "revisions",
      "page-attributes",
    ],
  ]);
});

add_filter("pre_get_posts", function($query) {
  if (defined("REST_REQUEST") && !empty($query->query["post_type"]) && $query->query["post_type"] === "slides") {
    $query->set("orderby", [
      "post_parent" => "ASC",
      "menu_order" => "ASC",
    ]);
  }

  return $query;
});
