<?php

namespace PAJERdesign\PolishMobilePhoneValidator\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author Robert Pajer
 */
class MobilePhoneValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (mb_strlen($value, 'UTF-8') < 9) {
            $this->context->buildViolation($constraint->lengthMessage)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(MobilePhone::LENGTH_ERROR)
                ->addViolation();
        }

        $phoneNumberPattern = '/^(2111|4500|4501|4502|4503|4504|4505|4506|4507|4508|4509|4510|4511|4512|4513|4514|4515|4516|4517|4518|4519|4520|4521|4522|4523|4524|4525|4526|4527|4528|4529|4530|4531|4532|4533|4534|4535|4536|4537|4538|4539|4540|4541|4542|4543|4544|4545|4546|4547|4548|4549|4550|4551|4552|4553|4554|4555|4556|4557|4558|4559|4560|4561|4562|4563|4564|4565|4566|4567|4568|4569|4570|4571|4572|4573|4574|4575|4576|4577|4578|4579|4580|4581|4582|4583|4584|4585|4586|4587|4588|4589|4590|4591|4592|4593|4594|4595|4596|4597|4598|4599|5000|5001|5002|5003|5004|5005|5006|5007|5008|5009|5010|5011|5012|5013|5014|5015|5016|5017|5018|5019|5020|5021|5022|5023|5024|5025|5026|5027|5028|5029|5030|5031|5032|5033|5034|5035|5036|5037|5038|5039|5040|5041|5042|5043|5044|5045|5046|5047|5048|5049|5050|5051|5052|5053|5054|5055|5056|5057|5058|5059|5060|5061|5062|5063|5064|5065|5066|5067|5068|5069|5070|5071|5072|5073|5074|5075|5076|5077|5078|5079|5080|5081|5082|5083|5084|5085|5086|5087|5088|5089|5090|5091|5092|5093|5094|5095|5096|5097|5098|5099|5100|5101|5102|5103|5104|5105|5106|5107|5108|5109|5110|5111|5112|5113|5114|5115|5116|5117|5118|5119|5120|5121|5122|5123|5124|5125|5126|5127|5128|5129|5130|5131|5132|5133|5134|5135|5136|5137|5138|5139|5140|5141|5142|5143|5144|5145|5146|5147|5148|5149|5150|5151|5152|5153|5154|5155|5156|5157|5158|5159|5160|5161|5162|5163|5164|5165|5166|5167|5168|5169|5170|5171|5172|5173|5174|5175|5176|5177|5178|5179|5180|5181|5182|5183|5184|5185|5186|5187|5188|5189|5190|5191|5192|5193|5194|5195|5196|5197|5198|5199|5300|5301|5302|5303|5304|5305|5306|5307|5308|5309|5310|5311|5312|5313|5314|5315|5316|5317|5318|5319|5320|5321|5322|5323|5324|5325|5326|5327|5328|5329|5330|5331|5332|5333|5334|5335|5336|5337|5338|5339|5340|5341|5342|5343|5344|5345|5346|5347|5348|5349|5350|5351|5352|5353|5354|5355|5356|5357|5358|5359|5360|5361|5362|5363|5364|5365|5366|5367|5368|5369|5370|5371|5372|5373|5374|5375|5376|5377|5378|5379|5380|5381|5382|5383|5384|5385|5386|5387|5388|5389|5390|5391|5392|5393|5394|5395|5396|5397|5398|5399|5700|5701|5702|5703|5704|5705|5706|5707|5708|5709|5710|5711|5712|5713|5714|5715|5716|5717|5718|5719|5720|5721|5722|5723|5724|5725|5726|5727|5728|5729|5730|5731|5732|5733|5734|5735|5736|5737|5738|5739|5740|5741|5742|5743|5744|5745|5746|5747|5748|5749|5750|5751|5752|5753|5754|5755|5756|5757|5758|5759|5760|5761|5762|5763|5764|5765|5766|5767|5768|5769|5770|5771|5772|5773|5774|5775|5776|5777|5778|5779|5780|5781|5782|5783|5784|5785|5786|5787|5788|5789|5790|5791|5792|5793|5794|5795|5796|5797|5798|5799|6000|6001|6002|6003|6004|6005|6006|6007|6008|6009|6010|6011|6012|6013|6014|6015|6016|6017|6018|6019|6020|6021|6022|6023|6024|6025|6026|6027|6028|6029|6030|6031|6032|6033|6034|6035|6036|6037|6038|6039|6040|6041|6042|6043|6044|6045|6046|6047|6048|6049|6050|6051|6052|6053|6054|6055|6056|6057|6058|6059|6060|6061|6062|6063|6064|6065|6066|6067|6068|6069|6070|6071|6072|6073|6074|6075|6076|6077|6078|6079|6080|6081|6082|6083|6084|6085|6086|6087|6088|6089|6090|6091|6092|6093|6094|6095|6096|6097|6098|6099|6600|6601|6602|6603|6604|6605|6606|6607|6608|6609|6610|6611|6612|6613|6614|6615|6616|6617|6618|6619|6620|6621|6622|6623|6624|6625|6626|6627|6628|6629|6630|6631|6632|6633|6634|6635|6636|6637|6638|6639|6640|6641|6642|6643|6644|6645|6646|6647|6648|6649|6650|6651|6652|6653|6654|6655|6656|6657|6658|6659|6660|6661|6662|6663|6664|6665|6666|6667|6668|6669|6670|6671|6672|6673|6674|6675|6676|6677|6678|6679|6680|6681|6682|6683|6684|6685|6686|6687|6688|6689|6690|6691|6692|6693|6694|6695|6696|6697|6698|6699|6900|6901|6902|6903|6904|6905|6906|6907|6908|6909|6910|6911|6912|6913|6914|6915|6916|6917|6918|6919|6920|6921|6922|6923|6924|6925|6926|6927|6928|6929|6930|6931|6932|6933|6934|6935|6936|6937|6938|6939|6940|6941|6942|6943|6944|6945|6946|6947|6948|6949|6950|6951|6952|6953|6954|6955|6956|6957|6958|6959|6960|6961|6962|6963|6964|6965|6966|6967|6968|6969|6970|6971|6972|6973|6974|6975|6976|6977|6978|6979|6980|6981|6982|6983|6984|6985|6986|6987|6988|6989|6990|6991|6992|6993|6994|6995|6996|6997|6998|6999|7200|7201|7202|7203|7204|7205|7206|7207|7208|7209|7210|7211|7212|7213|7214|7215|7216|7217|7218|7219|7220|7221|7222|7223|7224|7225|7226|7227|7228|7229|7230|7231|7232|7233|7234|7235|7236|7237|7238|7239|7240|7241|7242|7243|7244|7245|7246|7247|7248|7249|7250|7251|7252|7253|7254|7255|7256|7257|7258|7259|7260|7261|7262|7263|7264|7265|7266|7267|7268|7269|7270|7271|7272|7273|7274|7275|7276|7277|7278|7279|7280|7281|7282|7283|7284|7285|7286|7287|7288|7289|7290|7291|7292|7293|7294|7295|7296|7297|7298|7299|7300|7301|7302|7303|7304|7305|7306|7307|7308|7309|7310|7311|7312|7313|7314|7315|7316|7317|7318|7319|7320|7321|7322|7323|7324|7325|7326|7327|7328|7329|7330|7331|7332|7333|7334|7335|7336|7337|7338|7339|7340|7341|7342|7343|7344|7345|7346|7347|7348|7349|7350|7351|7352|7353|7354|7355|7356|7357|7358|7359|7360|7361|7362|7363|7364|7365|7366|7367|7368|7369|7370|7371|7372|7373|7374|7375|7376|7377|7378|7379|7380|7381|7382|7383|7384|7385|7386|7387|7388|7389|7390|7391|7392|7393|7394|7395|7396|7397|7398|7399|7800|7801|7802|7803|7804|7805|7806|7807|7808|7809|7810|7811|7812|7813|7814|7815|7816|7817|7818|7819|7820|7821|7822|7823|7824|7825|7826|7827|7828|7829|7830|7831|7832|7833|7834|7835|7836|7837|7838|7839|7840|7841|7842|7843|7844|7845|7846|7847|7848|7849|7850|7851|7852|7853|7854|7855|7856|7857|7858|7859|7860|7861|7862|7863|7864|7865|7866|7867|7868|7869|7870|7871|7872|7873|7874|7875|7876|7877|7878|7879|7880|7881|7882|7883|7884|7885|7886|7887|7888|7889|7890|7891|7892|7893|7894|7895|7896|7897|7898|7899|7900|7901|7902|7903|7904|7905|7906|7907|7908|7909|7910|7911|7912|7913|7914|7915|7916|7917|7918|7919|7920|7921|7922|7923|7924|7925|7926|7927|7928|7929|7930|7931|7932|7933|7934|7935|7936|7937|7938|7939|7940|7941|7942|7943|7944|7945|7946|7947|7948|7949|7950|7951|7952|7953|7954|7955|7956|7957|7958|7959|7960|7961|7962|7963|7964|7965|7966|7967|7968|7969|7970|7971|7972|7973|7974|7975|7976|7977|7978|7979|7980|7981|7982|7983|7984|7985|7986|7987|7988|7989|7990|7991|7992|7993|7994|7995|7996|7997|7998|7999|8800|8801|8802|8803|8804|8805|8806|8807|8808|8809|8810|8811|8812|8813|8814|8815|8816|8817|8818|8819|8820|8821|8822|8823|8824|8825|8826|8827|8828|8829|8830|8831|8833|8834|8835|8836|8837|8838|8839|8840|8841|8842|8843|8844|8845|8846|8847|8848|8849|8850|8851|8852|8853|8854|8855|8856|8857|8858|8859|8860|8861|8862|8863|8864|8865|8866|8867|8868|8869|8870|8871|8872|8873|8874|8875|8876|8877|8878|8879|8880|8881|8882|8883|8884|8885|8886|8887|8888|8889|8890|8891|8892|8893|8894|8895|8896|8897|8898|8899)/';

        if (!preg_match($phoneNumberPattern, $value)) {
            $this->context->buildViolation($constraint->invalidNumberMessage)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(MobilePhone::INVALID_NUMBER_ERROR)
                ->addViolation();
        }
    }
}
