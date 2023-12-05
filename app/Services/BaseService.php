<?php

namespace App\Services;

use Validator;
use App\Services\IBaseService;
use App\Helpers\GlobalHelper;
use Symfony\Component\HttpFoundation\Response;

class BaseService implements IBaseService
{
    public $data;
    public $message;
    public $errorMessage;
    public $validator;
    public $request = [];
    // Laravel Validation rules : https://laravel.com/docs/5.7/validation#custom-error-messages
    public $rules = []; // define rule Laravel Validator style
    public $ruleMessages = []; // define rule message Laravel Validator style
    public $httpCode = Response::HTTP_OK;

    public function __construct($request = [])
    {
        $this->request = $request;
        $this->constructAdapter();
    }

    public function constructAdapter()
    {
    } //for setting default value

    public function execute()
    {
        throw new \Exception('Need to Implement "execute" method from BaseService');
    }

    public function isError()
    {
        if (empty($this->errorMessage)) {
            return false;
        }
        return true;
    }

    public function run()
    {
        if ($this->validatorIsArray()) {
            $this->validator = Validator::make($this->request, $this->rules, $this->ruleMessages);

            if ($this->validator->fails()) {
                $this->httpCode = Response::HTTP_BAD_REQUEST;
                $errors         = $this->validator->errors()->toArray();
                $this->errorMessage  = GlobalHelper::_formatValidationError($errors);
                return $this;
            } else {
                return $this->execute();
            }
        } else {
            $this->errorMessage = 'a validator parameter error occurred';
            return $this;
        }
    }

    private function validatorIsArray()
    {
        if (is_array($this->request) && is_array($this->rules) && is_array($this->ruleMessages)) {
            return true;
        }
        return false;
    }
}
