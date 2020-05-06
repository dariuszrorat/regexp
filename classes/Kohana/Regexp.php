<?php

defined('SYSPATH') or die('No direct script access.');

class Kohana_Regexp
{
    protected $_pattern;
    protected $_subject;

    /**
     * Creates a new Regexp object.
     *
     * @param   string
     * @return  regex
     */
    public static function factory($pattern = NULL)
    {
        return new Regexp($pattern);
    }

    /**
     * Creates a new Regexp object.
     *
     * @param   string
     * @return  void
     */
    public function __construct($pattern = NULL)
    {
        $this->_pattern = $pattern;
    }

    public function subject($subject)
    {
        $this->_subject = $subject;
        return $this;
    }

    public function filter($replacement, $limit = -1)
    {
        return preg_filter($this->_pattern, $replacement, $this->_subject, $limit, $count);
    }

    public function find($flags = 0, $offset = 0, $default = NULL)
    {
        preg_match($this->_pattern, $this->_subject, $matches, $flags, $offset);
        return Arr::get($matches, 0, $default);
    }

    public function find_all($flags = PREG_PATTERN_ORDER, $offset = 0)
    {
        preg_match_all($this->_pattern, $this->_subject, $matches, $flags, $offset);
        return Arr::get($matches, 0, array());
    }

    public function grep($input, $flags = 0)
    {
        return preg_grep($this->_pattern, $input, $flags);
    }

    public function quote($delimiter = NULL)
    {
        return preg_quote($this->_subject, $delimiter);
    }

    public function replace($replacement, $limit = -1)
    {
        if (is_callable($replacement))
        {
            return preg_replace_callback($this->_pattern, $replacement, $this->_subject, $limit, $count);
        }

        return preg_replace($this->_pattern, $replacement, $this->_subject, $limit, $count);
    }

    public function split($limit = -1, $flags = 0)
    {
        return preg_split($this->_pattern, $this->_subject, $limit, $flags);
    }

}

// End Regexp
