<?php

namespace app\controllers;
use georgique\yii2\jsonrpc\Controller;

class JsonRpcBodyController extends Controller {
    // Disable CSRF validation for JSON-RPC POST requests
    public $enableCsrfValidation = false;
	// With the customization JSON RPC params will be passed to the target action
	// as request body params, not as action function arguments
    public $paramsPassMethod = self::JSON_RPC_PARAMS_PASS_BODY;

}