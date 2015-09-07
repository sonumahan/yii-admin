<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "volunteers".
 *
 * @property integer $id
 * @property string $validated
 * @property integer $approved
 * @property integer $teacher
 * @property integer $volunteer
 * @property integer $sharing
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $phone
 * @property string $skype
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $university
 * @property string $partner_association
 * @property string $skills
 * @property resource $skills_in_detail
 * @property string $dob
 * @property string $regions_of_interest
 * @property resource $about
 * @property string $profile_image
 * @property string $auto_response_date
 * @property string $username
 * @property string $password
 * @property string $date_added
 * @property resource $cache_description
 * @property double $rank
 * @property string $cache_date
 * @property integer $facebook_id
 * @property string $publish
 * @property string $volunteer_cv
 * @property string $month_avail
 * @property string $status_text
 * @property integer $is_searchable
 * @property string $is_partner_search
 * @property string $last_login
 * @property string $is_sent_mail
 * @property string $is_other_search
 * @property string $stub
 * @property string $sfvID
 * @property integer $login_count
 * @property string $created_at_review
 */
class Volunteer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'volunteers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['validated', 'volunteer', 'sharing', 'username', 'password', 'volunteer_cv', 'month_avail', 'is_searchable', 'is_partner_search', 'stub'], 'required'],
            [['approved', 'teacher', 'volunteer', 'sharing', 'facebook_id', 'is_searchable', 'login_count'], 'integer'],
            [['skills_in_detail', 'about', 'cache_description', 'is_partner_search', 'is_sent_mail', 'is_other_search', 'created_at_review'], 'string'],
            [['dob', 'auto_response_date', 'date_added', 'cache_date', 'last_login'], 'safe'],
            [['rank'], 'number'],
            [['validated', 'city', 'partner_association'], 'string', 'max' => 100],
            [['first_name', 'last_name', 'country', 'university', 'skills', 'regions_of_interest', 'username'], 'string', 'max' => 50],
            [['phone_number', 'phone', 'skype'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 200],
            [['address', 'profile_image', 'password', 'volunteer_cv', 'month_avail', 'status_text', 'stub'], 'string', 'max' => 255],
            [['state'], 'string', 'max' => 2],
            [['zip'], 'string', 'max' => 15],
            [['publish'], 'string', 'max' => 3],
            [['sfvID'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'validated' => 'Validated',
            'approved' => 'Approved',
            'teacher' => 'Teacher',
            'volunteer' => 'Volunteer',
            'sharing' => 'Sharing',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'country' => 'Country',
            'university' => 'University',
            'partner_association' => 'Partner Association',
            'skills' => 'Skills',
            'skills_in_detail' => 'Skills In Detail',
            'dob' => 'Dob',
            'regions_of_interest' => 'Regions Of Interest',
            'about' => 'About',
            'profile_image' => 'Profile Image',
            'auto_response_date' => 'Auto Response Date',
            'username' => 'Username',
            'password' => 'Password',
            'date_added' => 'Date Added',
            'cache_description' => 'Cache Description',
            'rank' => 'Rank',
            'cache_date' => 'Cache Date',
            'facebook_id' => 'Facebook ID',
            'publish' => 'Publish',
            'volunteer_cv' => 'Volunteer Cv',
            'month_avail' => 'Month Avail',
            'status_text' => 'Status Text',
            'is_searchable' => 'Is Searchable',
            'is_partner_search' => 'Is Partner Search',
            'last_login' => 'Last Login',
            'is_sent_mail' => 'Is Sent Mail',
            'is_other_search' => 'Is Other Search',
            'stub' => 'Stub',
            'sfvID' => 'Sfv ID',
            'login_count' => 'Login Count',
            'created_at_review' => 'Created At Review',
        ];
    }
}
