<?
    namespace Sale\Handlers\Delivery;

    use Bitrix\Sale\Delivery\CalculationResult;
    use Bitrix\Sale\Delivery\Services\Base;


    class STSHandler extends Base {


        public static function getClassTitle()
        {

            return 'Доставка';

        }

        public static function getClassDescription()
        {
            return 'Доставка';
        }

        protected function calculateConcrete(\Bitrix\Sale\Shipment $shipment)

        {
           // echo '<pre>'; print_r($shipment);
            //print_r($shipment);
            $LOGISTIC = \Logistic::getInstance($_SESSION["TF_LOCATION_SELECTED_CITY_NAME"]);
            $result = new CalculationResult();
            $price = floatval($this->config["MAIN"]["PRICE"]);
            $weight = floatval($shipment->getWeight()) / 1000;

            $result->setDeliveryPrice(\Logistic::calcAll(95)['value']);
            $result->setPeriodDescription('1 день');
            print_r($result);
            return $result;
        }

        public function isCalculatePriceImmediately()
        {
            return true;
        }

        public static function whetherAdminExtraServicesShow()
        {
            return true;
        }

    }