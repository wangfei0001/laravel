<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 15
 * Date: 12-10-12
 * Time: 下午10:42
 * To change this template use File | Settings | File Templates.
 */



class Service_Response
{
    protected $success;

    protected $errorMessages = array();

    protected $successMessages = array();

    protected $validationMessages = array();

    protected $resultData = null;


    /***
     * @param null|Transfer_Abstract $data
     * @param null $success
     * @param array $successMessages
     * @param array $errorMessages
     */
    function __construct(Transfer_Abstract $data = null, $success=null,$successMessages = array(), $errorMessages = array(), $validationMessages = array())
    {
        if(isset($success)){
            $this->setSuccess($success);
        }
        $this->setResultData($data);
        $this->setSuccessMessages($successMessages);
        $this->setErrorMessages($errorMessages);
        $this->setValidationMessages($validationMessages);
    }

    /***
     * @return bool
     */
    public function isSuccess()
    {
        return (boolean)$this->success;
    }


    /***
     * @return bool
     */
    public function isFailed()
    {
        return !$this->success;
    }


    /***
     * @param $success
     * @return Service_Response
     */
    public function setSuccess($success)
    {
        assert(is_bool($success));
        $this->success = $success;
        return $this;
    }


    /***
     * @param $message
     * @return Service_Response
     */
    public function addErrorMessage($message)
    {
        if(is_string($message)){
            $this->errorMessages[] = $message;
        }else if(is_array($message)){
            $this->errorMessages = array_merge($this->errorMessages,$message);
        }
        return $this;
    }


    /***
     * @param $message
     * @return Service_Response
     */
    public function addSuccessMessage($message)
    {
        if(is_string($message)){
            $this->successMessages[] = $message;
        }else if(is_array($message)){
            $this->successMessages = array_merge($this->successMessages,$message);
        }
        return $this;
    }


    /***
     * Add validation Messages
     *
     * @param $message
     * @return Service_Response
     */
    public function addValidationMessage($message)
    {
        if(is_string($message)){
            $this->validationMessages[] = $message;
        }else if(is_array($message)){
            $this->validationMessages = array_merge($this->validationMessages,$message);
        }
        return $this;
    }


    /***
     * @param array $messages
     * @return Service_Response
     */
    public function setErrorMessages(array $messages)
    {
        $this->errorMessages = $messages;
        return $this;
    }


    /***
     * @param array $messages
     * @return Service_Response
     */
    public function setValidationMessages(array $messages)
    {
        $this->validationMessages = $messages;

        return $this;
    }

    /***
     * @param array $messages
     * @return Service_Response
     */
    public function setSuccessMessages(array $messages)
    {
        $this->successMessages = $messages;
        return $this;
    }


    /***
     * @return bool
     */
    public function hasSuccessMessages()
    {
        return count($this->successMessages) > 0;
    }


    /***
     * @return bool
     */
    public function hasErrorMessages()
    {
        return count($this->errorMessages) > 0;
    }

    /***
     * @return bool
     */
    public function hasValidationMessages()
    {
        return count($this->validationMessages) > 0;
    }


    /***
     * @param $data
     * @return Service_Response
     */
    public function setResultData($data)
    {
        $this->resultData = $data;
        return $this;
    }


    /***
     * @return null
     */
    public function getResultData()
    {
        return $this->resultData;
    }

    public function getLastErrorMessage()
    {
        $message = '';
        if($this->hasErrorMessages()){
            $message = $this->errorMessages[count($this->errorMessages)-1];
        }
        return $message;
    }
}
