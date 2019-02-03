# twig_dump_to_yaml

This is a Drupal 8 module that provides a custom twig filter for dumping renderable arrays as YAML.

An example use-case is PatternLab, where dummy content is provided in the form of YAML. Instead of roughly approximating a Drupal renderable array, instead use this filter to dump a real render array to YAML and paste it into PatternLab instead.

## Usage

After enabling the module, use the filter in any Twig template as follows:

`{{ content|dump_to_yaml }}`

## TODO:

- Abandon inline template in favor of a real template
- Implement proper type checking in filter
