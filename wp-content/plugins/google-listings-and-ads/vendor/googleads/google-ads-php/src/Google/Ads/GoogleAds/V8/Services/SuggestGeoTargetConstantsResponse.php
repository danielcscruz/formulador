<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/services/geo_target_constant_service.proto

namespace Google\Ads\GoogleAds\V8\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for [GeoTargetConstantService.SuggestGeoTargetConstants][google.ads.googleads.v8.services.GeoTargetConstantService.SuggestGeoTargetConstants].
 *
 * Generated from protobuf message <code>google.ads.googleads.v8.services.SuggestGeoTargetConstantsResponse</code>
 */
class SuggestGeoTargetConstantsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Geo target constant suggestions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.services.GeoTargetConstantSuggestion geo_target_constant_suggestions = 1;</code>
     */
    private $geo_target_constant_suggestions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V8\Services\GeoTargetConstantSuggestion[]|\Google\Protobuf\Internal\RepeatedField $geo_target_constant_suggestions
     *           Geo target constant suggestions.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V8\Services\GeoTargetConstantService::initOnce();
        parent::__construct($data);
    }

    /**
     * Geo target constant suggestions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.services.GeoTargetConstantSuggestion geo_target_constant_suggestions = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGeoTargetConstantSuggestions()
    {
        return $this->geo_target_constant_suggestions;
    }

    /**
     * Geo target constant suggestions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.services.GeoTargetConstantSuggestion geo_target_constant_suggestions = 1;</code>
     * @param \Google\Ads\GoogleAds\V8\Services\GeoTargetConstantSuggestion[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGeoTargetConstantSuggestions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V8\Services\GeoTargetConstantSuggestion::class);
        $this->geo_target_constant_suggestions = $arr;

        return $this;
    }

}
