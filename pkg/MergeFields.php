<?php
        
    class EchosignMergeFields{
        
        protected $fields = array();
        
        function add($field, $value){
            $this->fields[] = array('fieldName' => $field, 'defaultValue' => $value);
        }
        
        function asArray(){
            
            return $this->fields;
            
        }
        
    }