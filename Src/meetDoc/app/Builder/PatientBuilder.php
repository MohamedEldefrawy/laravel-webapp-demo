<?php

namespace App\Builder;

use App\Builder\Contracts\UserBuilderInterface;

class PatientBuilder implements UserBuilderInterface
{

    private int $id;
    private string $email;
    private string $phone;
    private string $password;
    private float $weight = 0;
    private float $height = 0;
    private string $gender = "male";
    private int $age = 0;
    private string $bloodType = "";
    private string $firstName;
    private string $lastName;
    private int $created_by;
    private array $symptoms = [];
    private string $clinicCode;
    private int $clinicId;


    /**
     * @return int
     */
    public function getClinicId(): int
    {
        return $this->clinicId;
    }

    /**
     * @param int $clinicId
     */
    public function setClinicId(int $clinicId): void
    {
        $this->clinicId = $clinicId;
    }

    /**
     * @return string
     */
    public function getClinicCode(): string
    {
        return $this->clinicCode;
    }

    /**
     * @param string $clinicCode
     */
    public function setClinicCode(string $clinicCode): void
    {
        $this->clinicCode = $clinicCode;
    }

    private string $profileImage;
    private array $documents;


    /**
     * @return int
     * @author Mohamed Eldefrawy
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setId(int $id): PatientBuilder
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     * @author Mohamed Eldefrawy
     */
    public function getSymptoms(): array
    {
        return $this->symptoms;

    }

    /**
     * @param array $symptoms
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setSymptoms(array $symptoms): PatientBuilder
    {
        $this->symptoms = $symptoms;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getProfileImage(): string
    {
        return $this->profileImage;
    }

    /**
     * @param string $profileImage
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setProfileImage(string $profileImage): PatientBuilder
    {
        $this->profileImage = $profileImage;
        return $this;

    }

    /**
     * @return array
     * @author Mohamed Eldefrawy
     */
    public function getDocuments(): array
    {
        return $this->documents;
    }

    /**
     * @param array $documents
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setDocuments(array $documents): PatientBuilder
    {
        $this->documents = $documents;
        return $this;

    }

    /**
     * @return int
     * @author Mohamed Eldefarwy
     */
    public function getCreatedBy(): int
    {
        return $this->created_by;
    }

    /**
     * @param int $created_by
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setCreatedBy(int $created_by): PatientBuilder
    {
        $this->created_by = $created_by;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setEmail(string $email): PatientBuilder
    {
        $this->email = $email;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setPhone(string $phone): PatientBuilder
    {
        $this->phone = $phone;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setPassword(string $password): PatientBuilder
    {
        $this->password = $password;
        return $this;

    }

    /**
     * @return float
     * @author Mohamed Eldefrawy
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setWeight(float $weight): PatientBuilder
    {
        $this->weight = $weight;
        return $this;

    }

    /**
     * @return float
     * @author Mohamed Eldefrawy
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setHeight(float $height): PatientBuilder
    {
        $this->height = $height;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setGender(string $gender): PatientBuilder
    {
        $this->gender = $gender;
        return $this;

    }

    /**
     * @return int
     * @author Mohamed Eldefrawy
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setAge(int $age): PatientBuilder
    {
        $this->age = $age;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getBloodType(): string
    {
        return $this->bloodType;
    }

    /**
     * @param string $bloodType
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setBloodType(string $bloodType): PatientBuilder
    {
        $this->bloodType = $bloodType;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setFirstName(string $firstName): PatientBuilder
    {
        $this->firstName = $firstName;
        return $this;

    }

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setLastName(string $lastName): PatientBuilder
    {
        $this->lastName = $lastName;
        return $this;

    }


}
