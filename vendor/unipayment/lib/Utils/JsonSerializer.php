<?php

namespace UniPayment\SDK\Utils;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UniPayment\SDK\UnipaymentSDKException;

class JsonSerializer
{
    private static function getSerializer(): Serializer
    {
        $extractor = new PropertyInfoExtractor([], [
            new PhpDocExtractor(),
            new ReflectionExtractor(),
        ]);
        return new Serializer(
            normalizers: [
                new ObjectNormalizer(null, null, null, $extractor),
                new DateTimeNormalizer([
                    DateTimeNormalizer::FORMAT_KEY => "yyyy-MM-dd'T'HH:mm:ss",
                ]),
                new GetSetMethodNormalizer(),
                new ArrayDenormalizer(),
            ],
            encoders: ['json' => new JsonEncoder()]
        );
    }

    private static function getDeserializer(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        return new Serializer(
            normalizers: [
                new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, new ReflectionExtractor()),
                new DateTimeNormalizer([
                    DateTimeNormalizer::FORMAT_KEY => "yyyy-MM-dd'T'HH:mm:ss",
                ]),
                new GetSetMethodNormalizer(),
                new ArrayDenormalizer(),
            ],
            encoders: ['json' => new JsonEncoder()]
        );
    }


    /**
     * @throws UnipaymentSDKException
     */
    public static function toJson(object $obj): string
    {
        try {
            $serializer = self::getDeserializer();
            $obj = $serializer->serialize($obj, 'json');
            return $obj;
        } catch (ExceptionInterface $exception) {
            throw new UnipaymentSDKException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @throws UnipaymentSDKException
     */
    public static function fromJSON(string $json, string $className): object
    {
        try {
            $serializer = self::getSerializer();
            return $serializer->deserialize($json, $className, 'json');
        } catch (\Exception $exception) {
            throw new UnipaymentSDKException($exception->getMessage(), $exception->getCode());
        }
    }
}