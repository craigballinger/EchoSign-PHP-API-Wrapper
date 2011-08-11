<?php
    
    /**
     * EchoSign API
     * @author Craig Ballinger <craig@pixelfusion.com>
     * @version 0.1
     */

    class EchoSignAPI{
        
        protected $client;
        protected $wsdl = 'https://secure.echosign.com/services/EchoSignDocumentService11?wsdl';
        protected $api_key;
        
        /**
        *
        * EchoSign API Constructor
        * @param string $api_key Echosign API Key
        * 
        */
        function __construct($api_key){
            $this->client = @new SoapClient($this->wsdl);
            $this->api_key = $api_key;
        }
        
        /**
         * 
         * Tests that you can successfully connect to EchoSign's API
         * 
         */
        function ping(){
            
            $result = $this->client->testPing(array('apiKey' => $this->api_key));
            return $result;
        }
        
        /**
         * 
         * Tests that you can successfully send files to EchoSign
         * @param string $file Path to a local file to send to the Echo Test
         * 
         */
        function testEchoFile($file){
            
            $contents = file_get_contents($file);
            
            $package = array(
                                'apiKey' => $this->api_key, 
                                'file' => base64_encode($contents)
                            );
            
            $result = $this->client->testEchoFile($package);
            
            return $result;
            
        }
        
        /**
         * 
         * Send a Document to the EchoSign API for signing
         * This will notify both the sender and signee by email that a document
         * is ready to be signed
         * @param EchosignDocumentPackage $package The prepared EchoSign Document Package
         * 
         */
        function sendDocument(EchosignDocumentPackage $package){
            
            $package_data = $package->asArray();
            $package_data['apiKey'] = $this->api_key;
            
            $result = $this->client->sendDocument($package_data);
            
            return $result;

        }
        
        /*
         * 
         * Cancels a Document in your library based on the DocumentKey
         * @param string $document_key The EchoSign library DocumentKey
         * @param string $comment An optional Comment with the reason of cancellation
         * @param boolean $notify_signer notify signer that the transaction has been cancelled
         * 
         */
        function cancelDocument($document_key, $comment = '', $notify_signer = false){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key,
                             'comment' => $comment,
                             'notifySigner' => $notify_signer
                            );
            
            $result = $this->client->cancelDocument($package);
            
            return $result;
            
        }
        
        /*
         * 
         * Retrieves the current status of a document
         * @param string $document_key The EchoSign library DocumentKey
         * 
         */
        function getDocumentInfo($document_key){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key
                            );
            
            $result = $this->client->getDocumentInfo($package);
            
            return $result;
            
        }
        
        /*
         * 
         * Retrieves the current version of a document as raw file contents
         * @param string $document_key The EchoSign library DocumentKey
         * 
         */
        function getLatestDocument($document_key){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key
                            );
            
            $result = $this->client->getLatestDocument($package);
            
            return $result;
            
        }
        
        /*
         * 
         * Retrieves the current version of a document as raw file contents
         * @param string $version_key The EchoSign library VersionKey
         * 
         */
        function getDocumentByVersion($version_key){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'versionKey' => $version_key
                            );
            
            $result = $this->client->getDocumentByVersion($package);
            
            return $result;
            
        }
        
        /*
         * 
         * Retrieves a url to access the current version of a document
         * @param string $document_key The EchoSign library DocumentKey
         * 
         */
        function getLatestDocumentUrl($document_key){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key
                            );
            
            $result = $this->client->getLatestDocumentUrl($package);
            
            return $result;
            
        }
        
        /*
         * 
         * Retrieves a list of images based on the current document version
         * @param string $document_key The EchoSign library DocumentKey
         * 
         */
        function getLatestImages($document_key){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key
                            );
            
            $result = $this->client->getLatestImages($package);
            
            return $result;
            
        }
        
        /**
         * 
         * Removes a Document from your library
         * @param string $document_key The DocumentKey of the library document you want to remove
         * 
         */      
        function removeDocument($document_key){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key
                            );
            
            $result = $this->client->removeDocument($package);
            
            return $result;
            
        }
         
        /**
         * 
         * Remind a signer a document is pending
         * @param string $document_key The DocumentKey of the library document
         * @param string $comment An option comment to include in the reminder
         * 
         */           
        function sendReminder($document_key, $comment = ''){
            
            $package = array(
                             'apiKey' => $this->api_key,
                             'documentKey' => $document_key,
                             'comment' => $comment
                            );
            
            $result = $this->client->sendReminder($package);
            
            return $result;
            
        }
         
        /**
         * 
         * Create an Embedded Widget to place on an internal custom page
         * @param EchosignWidgetPackage $package The prepared EchoSign Widget Package
         * 
         */        
        function createEmbeddedWidget(EchosignWidgetPackage $package){
            
            $package_data = array_merge(
                                            array('apiKey' => $this->api_key),
                                            $package->asArray()
                                        );
            
            $result = $this->client->createEmbeddedWidget($package_data);
            
            return $result;
            
        }
        
        /**
         * 
         * Create a Personalized Embedded Widget to place on an internal custom page
         * @param EchosignWidgetPackage $package The prepared EchoSign Widget Package
         * @param EchosignWidgetPersonalization $personalization The personalization information for the widget
         * 
         */          
        function createPersonalEmbeddedWidget(EchosignWidgetPackage $package, EchoSignWidgetPersonalization $personalization){
            
            $package_data = array_merge(
                                            array('apiKey' => $this->api_key),
                                            $package->asArray(), 
                                            $personalization->asArray()
                                        );
            
            $result = $this->client->createPersonalEmbeddedWidget($package_data);
            
            return $result;
            
        }
        
        /**
         * 
         * Personalize a previously created Embedded Widget
         * @param string $javascript The Embedded Widget javascript
         * @param EchosignWidgetPersonalization $personalization The personalization information for the widget
         * 
         */          
        function personalizeEmbeddedWidget($javascript, EchoSignWidgetPersonalization $personalization){
            
            $package_data = array_merge(
                                            array('apiKey' => $this->api_key),
                                            array('widgetJavascript' => $javascript), 
                                            $personalization->asArray()
                                        );

            $result = $this->client->personalizeEmbeddedWidget($package_data);
            
            return $result;
            
        }
        
        /**
         * 
         * Returns a list of Authorized users in your account
         * 
         */
        function getUsersInAccount(){
            
            $result = $this->client->getUsersInAccount(array('apiKey' => $this->api_key));
            
            return $result;
            
        }
        
    }