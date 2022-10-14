<?php

namespace App\Builder\Contracts;

use App\Builder\DocumentBuilder;

interface DocumentBuilderInterface
{
    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getLink(): string;


    /**
     * @param string $link
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setLink(string $link): DocumentBuilder;


    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getName(): string;


    /**
     * @param string $name
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setName(string $name): DocumentBuilder;


    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getType(): string;


    /**
     * @param string $type
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setType(string $type): DocumentBuilder;


    /**
     * @return int
     * @author Mohamed Eldefrawy
     */
    public function getUploadedBy(): int;


    /**
     * @param int $uploadedBy
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setUploadedBy(int $uploadedBy): DocumentBuilder;

}
