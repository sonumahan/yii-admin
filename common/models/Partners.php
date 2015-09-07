<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $organization_name
 * @property integer $index_id
 * @property string $member_type
 * @property string $category
 * @property string $organization_website
 * @property string $director_first_name
 * @property string $director_last_name
 * @property string $phone_number
 * @property string $director_email
 * @property string $secondary_email
 * @property string $third_email
 * @property string $address
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $region
 * @property string $location_title
 * @property integer $location_on_profile
 * @property resource $about
 * @property resource $volunteer_placement
 * @property resource $current_projects
 * @property string $project_title
 * @property resource $needs
 * @property resource $financial_needs
 * @property resource $bank_info
 * @property resource $in_kind_needs
 * @property resource $mission
 * @property string $paypal_email_address
 * @property string $profile_image
 * @property integer $profile_media
 * @property integer $describe_your_organization_media
 * @property integer $organization_needs_media
 * @property integer $volunteer_information_media
 * @property resource $cost_for_volunteers
 * @property double $average_cost_per_day
 * @property string $skills_needed
 * @property resource $logistics
 * @property resource $skills_needed_description
 * @property integer $classroom
 * @property string $username
 * @property string $password
 * @property string $lat
 * @property double $lng
 * @property string $partner_start_date
 * @property string $active_status
 * @property string $version
 * @property resource $custom_header
 * @property resource $custom_footer
 * @property string $tertiary_email
 * @property string $last_login
 * @property string $last_profile_update
 * @property string $acc_type
 * @property string $mailingaddress
 * @property string $mailingaddress2
 * @property string $mailingcity
 * @property string $mailingstate
 * @property string $mailingcountry
 * @property string $mailingzip
 * @property string $is_featured
 * @property string $stub
 * @property string $accomodation_info
 * @property string $sfpID
 * @property string $authenticated
 * @property string $whyop
 * @property resource $how_did_you_hear
 * @property string $submitted
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index_id', 'member_type', 'address2', 'location_title', 'location_on_profile', 'project_title', 'version', 'custom_header', 'custom_footer', 'last_login', 'last_profile_update', 'acc_type', 'mailingaddress', 'mailingaddress2', 'mailingcity', 'mailingstate', 'mailingcountry', 'mailingzip', 'stub'], 'required'],
            [['index_id', 'location_on_profile', 'profile_media', 'describe_your_organization_media', 'organization_needs_media', 'volunteer_information_media', 'classroom'], 'integer'],
            [['about', 'volunteer_placement', 'current_projects', 'needs', 'financial_needs', 'bank_info', 'in_kind_needs', 'mission', 'cost_for_volunteers', 'logistics', 'skills_needed_description', 'custom_header', 'custom_footer', 'is_featured', 'accomodation_info', 'whyop', 'how_did_you_hear'], 'string'],
            [['average_cost_per_day', 'lat', 'lng'], 'number'],
            [['partner_start_date', 'last_login', 'last_profile_update'], 'safe'],
            [['organization_name', 'third_email', 'address2', 'location_title', 'project_title', 'profile_image', 'skills_needed', 'password', 'version', 'acc_type', 'mailingaddress', 'mailingaddress2', 'stub', 'authenticated'], 'string', 'max' => 255],
            [['member_type', 'category', 'phone_number', 'active_status', 'sfpID'], 'string', 'max' => 20],
            [['organization_website', 'address', 'paypal_email_address'], 'string', 'max' => 100],
            [['director_first_name', 'director_last_name', 'director_email', 'secondary_email', 'city', 'country', 'username', 'tertiary_email', 'mailingcity', 'mailingcountry'], 'string', 'max' => 50],
            [['state', 'mailingstate'], 'string', 'max' => 2],
            [['zip', 'mailingzip'], 'string', 'max' => 15],
            [['region'], 'string', 'max' => 25],
            [['submitted'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organization_name' => 'Organization Name',
            'index_id' => 'Index ID',
            'member_type' => 'Member Type',
            'category' => 'Category',
            'organization_website' => 'Organization Website',
            'director_first_name' => 'Director First Name',
            'director_last_name' => 'Director Last Name',
            'phone_number' => 'Phone Number',
            'director_email' => 'Director Email',
            'secondary_email' => 'Secondary Email',
            'third_email' => 'Third Email',
            'address' => 'Address',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'country' => 'Country',
            'region' => 'Region',
            'location_title' => 'Location Title',
            'location_on_profile' => 'Location On Profile',
            'about' => 'About',
            'volunteer_placement' => 'Volunteer Placement',
            'current_projects' => 'Current Projects',
            'project_title' => 'Project Title',
            'needs' => 'Needs',
            'financial_needs' => 'Financial Needs',
            'bank_info' => 'Bank Info',
            'in_kind_needs' => 'In Kind Needs',
            'mission' => 'Mission',
            'paypal_email_address' => 'Paypal Email Address',
            'profile_image' => 'Profile Image',
            'profile_media' => 'Profile Media',
            'describe_your_organization_media' => 'Describe Your Organization Media',
            'organization_needs_media' => 'Organization Needs Media',
            'volunteer_information_media' => 'Volunteer Information Media',
            'cost_for_volunteers' => 'Cost For Volunteers',
            'average_cost_per_day' => 'Average Cost Per Day',
            'skills_needed' => 'Skills Needed',
            'logistics' => 'Logistics',
            'skills_needed_description' => 'Skills Needed Description',
            'classroom' => 'Classroom',
            'username' => 'Username',
            'password' => 'Password',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'partner_start_date' => 'Partner Start Date',
            'active_status' => 'Active Status',
            'version' => 'Version',
            'custom_header' => 'Custom Header',
            'custom_footer' => 'Custom Footer',
            'tertiary_email' => 'Tertiary Email',
            'last_login' => 'Last Login',
            'last_profile_update' => 'Last Profile Update',
            'acc_type' => 'Acc Type',
            'mailingaddress' => 'Mailingaddress',
            'mailingaddress2' => 'Mailingaddress2',
            'mailingcity' => 'Mailingcity',
            'mailingstate' => 'Mailingstate',
            'mailingcountry' => 'Mailingcountry',
            'mailingzip' => 'Mailingzip',
            'is_featured' => 'Is Featured',
            'stub' => 'Stub',
            'accomodation_info' => 'Accomodation Info',
            'sfpID' => 'Sfp ID',
            'authenticated' => 'Authenticated',
            'whyop' => 'Whyop',
            'how_did_you_hear' => 'How Did You Hear',
            'submitted' => 'Submitted',
        ];
    }
}
