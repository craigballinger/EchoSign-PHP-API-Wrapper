<?php

    class EchoSignDocument{
        
        protected $document_name;
        protected $filename;
        protected $filepath;
        protected $merge_fields;
        
        function __construct($document_name, $filepath, $filename = null){
            $this->document_name = $document_name;
            $this->filepath = $filepath;
            $this->filename = (!empty($filename) ? $filename : $this->getNameFromPath($filepath));
        }
        
        function getFileInfo(){
            
            $contents = file_get_contents($this->filepath);
            
            return array('FileInfo' => array(
                             //'file' => $this->filepath,
                             'file' => $contents,
                             'fileName' => $this->filename
                            )
                        );
        }
        
        function getDocumentName(){
            return $this->document_name;
        }
        
        function setMergeFields(EchoSignMergeFields $merge_fields){
            $this->merge_fields = ( !empty($merge_fields) ? $merge_fields : new EchoSignMergeFields );
        }
        
        function getMergeFields(){
            return $this->merge_fields;
        }
        
        protected function getNameFromPath($filepath){
                
            $ds = null;

            if(substr_count($filepath, '/')){
                $ds = '/';
            }elseif(substr_count($filepath, '\\')){
                $ds = '\\';
            }else{
                $filename = $filepath;
            }

            if(empty($filename)){
                $filename = substr($filepath, (strrpos($filepath, $ds)+1));
            }
            
            return $filename;
            
        }
        
    }
    