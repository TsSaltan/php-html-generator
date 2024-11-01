<?php
/*
 * Wrapper for compatibility with PHP 7 and PHP 8 versions
 */
namespace HtmlGenerator;
if(version_compare(PHP_VERSION, '8.0.0', '>=')){
    class MarkupWrapper {   
        public $attributeList = null;

        /**
         * Checks if an attribute is set for this tag and not null
         *
         * @param string $attribute The attribute to test
         * @return boolean The result of the test
         */
        public function offsetExists(mixed $offset): bool {
            return isset($this->attributeList[$offset]);
        }

        /**
         * Returns the value the attribute set for this tag
         *
         * @param string $attribute The attribute to get
         * @return mixed The stored result in this object
         */
        public function offsetGet(mixed $offset): mixed {
            return $this->offsetExists($offset) ? $this->attributeList[$offset] : null;
        }

        /**
         * Sets the value an attribute for this tag
         *
         * @param string $attribute The attribute to set
         * @param mixed $value The value to set
         * @return void
         */
        public function offsetSet(mixed $attribute, mixed $value): void {
            $this->attributeList[$attribute] = $value;
        }

        /**
         * Removes an attribute
         *
         * @param mixed $attribute The attribute to unset
         * @return void
         */
        public function offsetUnset(mixed $attribute): void {
            if ($this->offsetExists($attribute)) {
                unset($this->attributeList[$attribute]);
            }
        }
    }
} else {
    class MarkupWrapper {   
        public $attributeList = null;

        /**
         * Checks if an attribute is set for this tag and not null
         *
         * @param string $attribute The attribute to test
         * @return boolean The result of the test
         */
        public function offsetExists($offset){
            return isset($this->attributeList[$offset]);
        }

        /**
         * Returns the value the attribute set for this tag
         *
         * @param string $attribute The attribute to get
         * @return mixed The stored result in this object
         */
        public function offsetGet($offset){
            return $this->offsetExists($offset) ? $this->attributeList[$offset] : null;
        }

        /**
         * Sets the value an attribute for this tag
         *
         * @param string $attribute The attribute to set
         * @param mixed $value The value to set
         * @return void
         */
        public function offsetSet($attribute, $value){
            $this->attributeList[$attribute] = $value;
        }

        /**
         * Removes an attribute
         *
         * @param mixed $attribute The attribute to unset
         * @return void
         */
        public function offsetUnset($attribute){
            if ($this->offsetExists($attribute)) {
                unset($this->attributeList[$attribute]);
            }
        }
    }
}