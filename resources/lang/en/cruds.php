<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'name'                       => 'First Name',
            'name_helper'                => ' ',
            'email'                      => 'Email',
            'email_helper'               => ' ',
            'email_verified_at'          => 'Email verified at',
            'email_verified_at_helper'   => ' ',
            'password'                   => 'Password',
            'password_helper'            => ' ',
            'roles'                      => 'Roles',
            'roles_helper'               => ' ',
            'remember_token'             => 'Remember Token',
            'remember_token_helper'      => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'status'                     => 'Status',
            'status_helper'              => ' ',
            'surname'                    => 'Surname',
            'surname_helper'             => ' ',
            'notes'                      => 'Notes',
            'notes_helper'               => ' ',
            'welcome_email'              => 'Welcome Email Sent',
            'welcome_email_helper'       => ' ',
            'mailchimp'                  => 'Mailchimp',
            'mailchimp_helper'           => ' ',
            'discourse'                  => 'Discourse',
            'discourse_helper'           => ' ',
            'standing_order'             => 'Standing Order Status',
            'standing_order_helper'      => ' ',
            'membership_end_date'        => 'Membership End Date',
            'membership_end_date_helper' => 'If the member has left, when they did',
            'standing_order_name'        => 'Standing Order Name',
            'standing_order_name_helper' => 'Name on the account that the standing order comes from.',
            'direct_debit'               => 'Direct Debit',
            'direct_debit_helper'        => ' ',
            'postal_address'             => 'Postal Address',
            'postal_address_helper'      => ' ',
        ],
    ],
    'card' => [
        'title'          => 'Cards',
        'title_singular' => 'Card',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'number'            => 'Number',
            'number_helper'     => 'The 4 digit code on the front of the card/fob',
            'rfid'              => 'RFID',
            'rfid_helper'       => 'The code read by the RFID reader',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'active'            => 'Active',
            'active_helper'     => ' ',
            'paid_for'          => 'Paid For',
            'paid_for_helper'   => ' ',
        ],
    ],
    'machine' => [
        'title'          => 'Machines',
        'title_singular' => 'Machine',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'induction'         => 'Induction Required',
            'induction_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'code'              => 'Code',
            'code_helper'       => 'The id of the machine as sent by the access control device when querying',
            'active'            => 'Active',
            'active_helper'     => 'Uncheck to temporarily disable a machine',
        ],
    ],
    'induction' => [
        'title'          => 'Inductions',
        'title_singular' => 'Induction',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'user'               => 'User',
            'user_helper'        => ' ',
            'machine'            => 'Machine',
            'machine_helper'     => ' ',
            'inductor'           => 'Inductor',
            'inductor_helper'    => ' ',
            'inducted_by'        => 'Inducted By',
            'inducted_by_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'login' => [
        'title'          => 'Logins',
        'title_singular' => 'Login',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'machine'           => 'Machine',
            'machine_helper'    => ' ',
            'card'              => 'Card',
            'card_helper'       => ' ',
            'status'            => 'Status',
            'status_helper'     => 'Whether the attempted login was successful or not, using HTTP response status codes, e.g. 200 = success',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'question' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'machine'           => 'Machine',
            'machine_helper'    => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
            'text'              => 'Question Text',
            'text_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'title'             => 'Title',
            'title_helper'      => 'Format: \"Machine Name - Question Number\" e.g. \"Bandsaw - 3\"',
        ],
    ],
    'answer' => [
        'title'          => 'Answers',
        'title_singular' => 'Answer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
            'text'              => 'Answer Text',
            'text_helper'       => ' ',
            'correct'           => 'Correct Answer?',
            'correct_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
];
