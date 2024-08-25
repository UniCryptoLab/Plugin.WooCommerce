<?php

namespace UniPayment\SDK\Utils;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class JsonSerializer
{
    private static function getSerializer(): Serializer
    {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build();
    }

    public static function toJson(object $obj): string
    {
        $serializer = self::getSerializer();
        return $serializer->serialize($obj, 'json');
    }

    public static function fromJSON(string $json, string $className): object
    {
        $serializer = self::getSerializer();
        return $serializer->deserialize($json, $className, 'json');
    }
}