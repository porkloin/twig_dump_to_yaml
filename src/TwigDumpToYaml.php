<?php
namespace Drupal\twig_dump_to_yaml;

use Symfony\Component\Yaml\Yaml;

/**
 * Class TwigDumpToYaml.
 */
class TwigDumpToYaml extends \Twig_Extension {
  /**
   * {@inheritdoc}
   */
  public function getFilters() {
    return [
      new \Twig_SimpleFilter('dump_to_yaml', [
        $this, 'dumpToYaml',
        [
          //'needs_environment' => true,
          'is_safe'=>['html']
        ]
      ]),
    ];
  }
  /**
   * Twig filter callback: return the render array as a YAML string.
   *
   * @param array $build
   *   Render array of a field.
   *
   * @return string
   *   The label of a field. If $build is not a render array of a field, NULL is
   *   returned.
   */
  public function dumpToYaml(array $build) {
    $toYaml = Yaml::dump($build, $inline = 6, $indent = 2);
    $output = array(
      '#type' => 'inline_template',
      '#template' => '
        <pre style="
          background: black;
          color: green;
          border: 1px solid black;
          padding: 2em;
          width: calc(100% - 4em);
          max-height: 400px;
          overflow-y: scroll;
          text-shadow: none;
          ">{{dumped}}</pre>',
      '#context' => [
        'dumped' => $toYaml
      ]
    );
    return $output;
  }
}
