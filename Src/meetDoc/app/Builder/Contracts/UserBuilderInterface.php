<?php

namespace App\Builder\Contracts;

use App\Builder\PatientBuilder;

interface UserBuilderInterface
{
    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getEmail(): string;

    /**
     * @param string $email
     * @author Mohamed Eldefrawy
     */
    public function setEmail(string $email): PatientBuilder;

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getPhone(): string;

    /**
     * @param string $name
     * @author Mohamed Eldefrawy
     */
    public function setPhone(string $name): PatientBuilder;

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getPassword(): string;

    /**
     * @param string $password
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setPassword(string $password): PatientBuilder;

    /**
     * @return string
     * @author Mohamed Eldefrawy
     */
    public function getProfileImage(): string;


    /**
     * @param string $profileImage
     * @return PatientBuilder
     * @author Mohamed Eldefrawy
     */
    public function setProfileImage(string $profileImage): PatientBuilder;

}
