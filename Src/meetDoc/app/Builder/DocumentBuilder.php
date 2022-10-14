<?php

namespace App\Builder;

use App\Builder\Contracts\DocumentBuilderInterface;

class DocumentBuilder implements DocumentBuilderInterface
{

    private string $link;
    private string $name;
    private string $type;
    private int $uploadedBy;
    private int $patientId;

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setLink(string $link): DocumentBuilder
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setName(string $name): DocumentBuilder
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setType(string $type): DocumentBuilder
    {
        $this->type = $type;
        return $this;

    }

    /**
     * @return int
     * @author Mohamed Eldefrawy
     */
    public function getUploadedBy(): int
    {
        return $this->uploadedBy;
    }

    /**
     * @param int $uploadedBy
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setUploadedBy(int $uploadedBy): DocumentBuilder
    {
        $this->uploadedBy = $uploadedBy;
        return $this;
    }

    /**
     * @return int
     * @author Mohamed Eldefrawy
     */
    public function getPatientId(): int
    {
        return $this->patientId;
    }

    /**
     * @param int $patientId
     * @return DocumentBuilder
     * @author Mohamed Eldefrawy
     */
    public function setPatientId(int $patientId): DocumentBuilder
    {
        $this->patientId = $patientId;
        return $this;
    }
}
