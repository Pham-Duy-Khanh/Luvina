<?php

namespace Luvina\Test\Api\Data;

/**
 * Label interface
 *
 * @api
 */
interface StaffInterface
{

    const STAFF_ID = 'staff_id';

    const NAME = 'name';

    const BIRTHDAY = 'birthday';

    const DEV = 'dev';


    /**
     * @return mixed
     */
    public function getStaffId();

    /**
     * @param $staffId
     * @return mixed
     */
    public function setStaffId($staffId);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getBirthday();

    /**
     * @param $birthday
     * @return mixed
     */
    public function setBirthday($birthday);
}
