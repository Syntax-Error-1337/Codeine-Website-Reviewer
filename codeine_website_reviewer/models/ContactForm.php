<?php
class ContactForm extends CFormModel {
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;
	public $recaptcha;

	public function rules() {
        $isRecaptchaEnabled = Utils::isRecaptchaEnabled();
        $rules = array();
        $rules[] = array('name, email, subject, body', 'required');
        $rules[] = array('email', 'email');
        if($isRecaptchaEnabled) {
            $config = Utils::loadConfig('recaptcha');
            $rules[] = array('recaptcha', 'ext.recaptcha2.ReCaptcha2Validator', 'privateKey'=>$config['private-key'], 'message'=>Yii::t("app", "Please confirm you're not a robot"));
        } else if (CCaptcha::checkRequirements()) {
            $rules[] = array('verifyCode', 'CaptchaExtendedValidator');
        }
        return $rules;
	}

	public function attributeLabels() {
		return array(
		    'recaptcha'=>Yii::t('app', "Please confirm you're not a robot"),
			'verifyCode'=>Yii::t("app", "Verification Code"),
			'name' => Yii::t("app", "name"),
			'email' => Yii::t("app", "email"),
			'subject' => Yii::t("app", "subject"),
			'body' => Yii::t("app", "body"),
		);
	}
}