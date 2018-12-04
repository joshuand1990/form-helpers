<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 2018-12-02
 * Time: 13:58
 */


use Illuminate\Support\HtmlString;

if( ! function_exists('html')){
    /**
     * @param $content
     * @return HtmlString
     */
    function html($content)
    {
        return new HtmlString($content);
    }
}

if (! function_exists('select_year_range')) {

    /**
     * @param null $start_year
     * @param null $end_year
     * @param null $selected
     * @return HtmlString
     * @author Joshua
     */
    function select_year_range($start_year = null, $end_year = null, $selected = null)
    {
        $start_year = is_null($start_year) ? date('Y') - 10 : $start_year;
        $end_year   = is_null($end_year) ? date('Y') : $end_year;
        $years      = range($start_year, $end_year);
        $options    = [];

        foreach ($years as $year) {
            $is_selected = $selected == $year ? 'selected' : '';
            $options[]   = html("<option value='{$year}' {$is_selected}>{$year}</option>");
        }
        $html = implode('', $options);
        return html("<select name='year' id='year' class=>{$html}</select>");
    }
}

if (! function_exists('form_start')) {
    /**
     * create a form opening tag.
     * @param string $method
     * @param string $action
     * @param array $options
     * @return HtmlString
     * @author Joshua
     */
    function form_start($method = 'GET', $action = '', $options = [])
    {
        $attributes = options_to_html_attributes($options);

        return html("<form method='{$method}' action='{$action}' {$attributes}>");
    }
}

if (! function_exists('form_end')) {
    /**
     * Create a close form tag
     * @return HtmlString
     * @author Joshua
     */
    function form_end()
    {
        return html('</form>');
    }
}

if (! function_exists('form_submit')) {
    /**
     * Create a form submit
     * @param $text
     * @param array $options
     * @return HtmlString
     * @author Joshua
     */
    function form_submit($text = 'Submit', $options = [])
    {
        return button('submit', $text, $options);
    }
}

if (! function_exists('button')){
    /**
     * Create a button.
     *
     * @param string $type
     * @param string $text
     * @param array $options
     * @return HtmlString
     * @author Joshua
     */
    function button($type = 'button', $text = 'Button', $options = [])
    {
        $html = options_to_html_attributes($options);
        return html("<button type='{$type}' $html>{$text}</button>");
    }
}

if (! function_exists('form_input')) {

    /**
     * create a form input
     * @param string $type
     * @param array $options
     * @return HtmlString
     * @author Joshua
     */
    function form_input($type = 'text', $options = [])
    {
        $html = options_to_html_attributes($options);

        return html("<input type='{$type}' {$html} >");
    }
}

if (! function_exists('form_text')) {
    /**
     * Create a text input
     * @param $options
     * @return HtmlString
     * @author Joshua
     */
    function form_text($options = [])
    {
        return form_input('text', $options);
    }
}

if (! function_exists('form_hidden')) {
    /**
     * Create a text input
     * @param $options
     * @return HtmlString
     * @author Joshua
     */
    function form_hidden($options = [])
    {
        return form_input('hidden', $options);
    }
}

if (! function_exists('form_textarea'))
{
    /**
     * @param array $options
     * @return HtmlString
     * @author Joshua
     */
    function form_textarea($options = [])
    {
        $html = options_to_html_attributes($options);

        return html("<textarea {$html}></textarea>");
    }
}

if (! function_exists('anchor')) {
    /**
     * Create an Anchor Tag.
     * @param $href
     * @param $text
     * @param $options
     * @return HtmlString
     * @author Joshua
     */
    function anchor($href = '#', $text = 'anchor', $options = [])
    {
        $html = options_to_html_attributes($options);

        return html("<a href='{$href}' {$html}>{$text}</a>");
    }
}

if (! function_exists('options_to_html_attributes')) {
    /**
     * Convert the Options to HTML Attributes
     * @param $options
     * @return string
     * @author Joshua
     */
    function options_to_html_attributes($options = [])
    {
        $html = '';

        foreach ($options as $key => $option) {
            $html .= (!is_array($option)) ? " {$key}='{$option}' " : "";
        }

        return $html;
    }
}

if (! function_exists('form_select')) {
    /**
     * @param array $value_text
     * @param string $selected
     * @param array $options
     * @param string $baseSelect
     * @return HtmlString
     * @author Joshua
     */
    function form_select($value_text = [], $selected = null, $options = [], $baseSelect = "Select All")
    {
        $attributes = options_to_html_attributes($options);

        $options_tags[] = html("<option value='' selected >{$baseSelect}</option>");

        foreach ($value_text as $value => $text) {
            $is_selected      = $selected == $value ? 'selected' : '';
            $options_tags[]   = html("<option value='{$value}' {$is_selected}>{$text}</option>");
        }

        $html = implode('', $options_tags);

        return html("<select {$attributes}>{$html}</select>");
    }
}

if (! function_exists('form_label'))
{
    /**
     * @param string $text
     * @param array $options
     * @return HtmlString
     * @author Joshua
     */
    function form_label($text = '', $options = [])
    {
        $attributes = options_to_html_attributes($options);

        return html("<label {$attributes}>{$text}</label>");
    }
}


