<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $type
 * @property string|null $postcode codigo postal
 * @property string|null $street endereço
 * @property string|null $number numero
 * @property string|null $neighborhood bairro
 * @property string|null $complement complemento
 * @property int $client_id
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Avaliation
 *
 * @property int $id
 * @property int|null $avaliation local para o clienter colocar um texto de avaliação
 * @property string $note nota de 0 a 5 para o produto
 * @property bool $active true se o comentario vai aparacer no anuncio
 * @property int $client_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereAvaliation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Avaliation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Carrier
 *
 * @property int $id
 * @property string $name nome ou razão social do entregador
 * @property string|null $contact nome do contato
 * @property string|null $Phone telefone de contato
 * @property string|null $email email de contato
 * @property string|null $cell celular de contato
 * @property-read Collection|\App\Models\Shipment[] $shipments
 * @property-read int|null $shipments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereCell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier wherePhone($value)
 * @mixin \Eloquent
 */
	class Carrier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $description descrição da categoria
 * @property string|null $image url da imagem da categoria
 * @property-read Collection|\App\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name nomne da cidade
 * @property string $code Códigos dos municípios IBGE
 * @property int $state_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\State $state
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name nome ou razão social do cliente
 * @property string|null $fantasy nome fantasia do cliente
 * @property string|null $contact nome de contato ou de quem recebe
 * @property bool|null $is_company true se for pessoa juridica
 * @property string|null $doc_ssn cpf
 * @property string|null $doc_country CNPJ
 * @property string|null $doc_state inscrição estadual
 * @property string|null $doc_city inscrição municipal
 * @property \Illuminate\Support\Carbon|null $birthday data de nascimento
 * @property bool|null $is_active true se for liberada a compra
 * @property bool|null $news_letter true se desejar receber anuncios
 * @property bool|null $is_verified true se os dados foram verificados
 * @property string|null $note informação complementar do cliente
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Avaliation[] $avaliations
 * @property-read int|null $avaliations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contact[] $contacts
 * @property-read int|null $contacts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFantasy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNewsLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $type
 * @property string|null $contact nome do contato
 * @property string $description numero ou email ou outro valor
 * @property int $client_id
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereType($value)
 * @mixin \Eloquent
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name nome do pais
 * @property string $initials abreviatura do pais
 * @property-read Collection|\App\Models\State[] $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @mixin \Eloquent
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $code código do cupom
 * @property string $base_currency moeda do pagamento
 * @property int $value valor do desconto em moeda
 * @property int $percent valor do desconto em percentagem
 * @property \Illuminate\Support\Carbon $times_expire data da expiração da promoção
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereTimesExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereValue($value)
 * @mixin \Eloquent
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Fretado
 *
 * @property int $id
 * @property string $region nome da região
 * @property int $zipini CEP incial
 * @property int $zipfin CEP final
 * @property int $wini Peso inicial em kg
 * @property int $wfin Peso final em kg
 * @property int $value Valor do frete x 100
 * @property int $deadline Prazo de entrega em dias uteis
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereWfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereWini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereZipfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereZipini($value)
 * @mixin \Eloquent
 */
	class Fretado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $sku codigo unico do grupo de produto
 * @property string $name nome do grupo que aparece no anuncio
 * @property string $slug nome que aparece na url do anuncio
 * @property string|null $packing_format formato da embalagem
 * @property int $qty_ship quantidade enviada pelo mesmo valor de frete
 * @property int|null $grossweight preso bruto em gramas
 * @property int|null $netweight peso liquido em gramas
 * @property int|null $packing_length comprimento da embalagem em mm
 * @property int|null $packing_width largura da embalagem em mm
 * @property int|null $packing_height altura da embalagem em mm
 * @property int|null $product_length comprimento do produto em mm
 * @property int|null $product_width largura do produto em mm
 * @property int|null $product_height altura do produto em mm
 * @property string|null $description descrição do produto
 * @property string|null $description_short descrição curta do produto
 * @property string|null $description_long descrição longa do produto
 * @property string|null $technical_features dados técnicos do produto
 * @property int $order ordem em que o grupo que aparece no anuncio
 * @property int $active 1 se aparece para venda
 * @property int $seller_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Seller $sellers
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescriptionLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescriptionShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGrossweight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereNetweight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProductHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProductLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProductWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereQtyShip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTechnicalFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 */
	class Group extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $path url da imagem
 * @property string|null $description descrição da imagem
 * @property string|null $type tipo usado para seleção: principal, detalhe, outro
 * @property int $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Group $group
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Jadlog
 *
 * @property int $id
 * @property string $region nome da região
 * @property int $zipini CEP incial
 * @property int $zipfin CEP final
 * @property int $wini Peso inicial em kg
 * @property int $wfin Peso final em kg
 * @property int $value Valor do frete x 100
 * @property int $deadline Prazo de entrega em dias uteis
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereWfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereWini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereZipfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereZipini($value)
 * @mixin \Eloquent
 */
	class Jadlog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $status
 * @property int $base_currency moeda do pagamento
 * @property int|null $ship_value valor total do frete do produto
 * @property int|null $total valor total dos produtos
 * @property int|null $ship_deadline prazo de entrega
 * @property string|null $ship_form forma de envio dos produtos
 * @property string|null $ship_zip CEP do endereço de entrega do produto
 * @property string|null $doc_type CPF, CNPJ
 * @property string|null $doc_number numero do documento do comprador
 * @property string|null $coupon_code codigo do cupom de desconto
 * @property int|null $discount valor do desconto dado na compra
 * @property int|null $sub_total valor total do produto mais o frete
 * @property int|null $grand_total valor do produto, mais o frete, menos o desconto
 * @property string|null $payby boleto, deposito, cartão
 * @property string|null $url_pay código para url do pagamento gerado
 * @property string|null $payment_code Código que identifica o pagamento
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderProduct[] $order_products
 * @property-read int|null $order_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shipment[] $shipments
 * @property-read int|null $shipments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDocNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDocType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUrlPay($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderProduct
 *
 * @property int $id
 * @property string $sku sku do produto
 * @property string $product_description descrição do produto
 * @property string $base_currency moeda do pagamento
 * @property int $unitary_price valor unitário do produto
 * @property int $amount quantidade comprada de produto
 * @property int $base_total valor total dos produtos
 * @property int $discount_percent valor do desconto em percentual
 * @property string|null $additional informação acicional
 * @property int $order_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereBaseTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUnitaryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUpdatedAt($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $status
 * @property string|null $method forma de pagamento
 * @property int|null $base_currency moeda do pagamento
 * @property int|null $value valor a ser pago
 * @property int|null $parcel numero de parcelas
 * @property \Illuminate\Support\Carbon $due_date data de vencimento
 * @property \Illuminate\Support\Carbon|null $payment_date data do vencimento
 * @property string|null $note obs complementar o pagamento
 * @property int $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereValue($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $sku codigo unico do produto
 * @property string $name nome do produto que aparece no anuncio
 * @property string|null $slug nome que aparece na url do anuncio
 * @property string|null $color cor de destaque do produto
 * @property string|null $base_currency moeda do pagamento
 * @property int $price preço de venda do anuncio x 100
 * @property int $price_max preço máximo do anuncio x 100
 * @property int $stock Quantidade em estoque do produto
 * @property string|null $image url da imagem principal do produto
 * @property int $order ordem em que aparece no anuncio
 * @property int|null $active 1 se aparece para venda
 * @property int $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Avaliation[] $avaliations
 * @property-read int|null $avaliations_count
 * @property-read \App\Models\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderProduct[] $order_products
 * @property-read int|null $order_products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seller
 *
 * @property int $id
 * @property string $name nome do vendedor
 * @property string|null $description dados do vendedor
 * @property-read Collection|\App\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereName($value)
 * @mixin \Eloquent
 */
	class Seller extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shipment
 *
 * @property int $id
 * @property string $status
 * @property string $sku sku do produto
 * @property string $nome nome do produto
 * @property string $base_currency moeda do pagamento
 * @property int $price_prod preço de venda do produto
 * @property int $total_qty quantidade por embalagem
 * @property int $total_weight peso em gramas unitario da embalgem do produto comprado
 * @property string $packing_width largura em mm da embalagem do produto comprado
 * @property string $packing_height altura em mm da embalagem do produto comprado
 * @property string $packing_lenght comprimento em mm da embalagem do produto comprado
 * @property string|null $track_number coodigo de rastreio
 * @property string|null $contact dados para entrar em contato o cliente
 * @property string|null $additional informações adicionais de envio
 * @property string|null $postcode codigo postal
 * @property string|null $address endereço de entrega
 * @property string|null $number numero da entrega
 * @property string|null $neighborhood bairro da entrega
 * @property string|null $complement dados complementares da entrega
 * @property int $order_id
 * @property int $carrier_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carrier $carrier
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePackingHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePackingLenght($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePackingWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePriceProd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereTotalQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereTotalWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereTrackNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Shipment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\State
 *
 * @property int $id
 * @property string $name nome do estado
 * @property string $initials sigla do estado
 * @property int $country_id
 * @property-read Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @mixin \Eloquent
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

