<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'amer-services'      => [
                [
                    'name' => 'Visit Visa for Dependents',
                    'desc' => 'Apply for a visit visa for dependent family members.',
                    'docs' => 'Sponsor passport & UAE residence visa@@@Sponsor Emirates ID@@@Proof of accommodation@@@Health insurance@@@Dependent passport copy@@@Medical clearance (18+)@@@NOC from father (if applicable)@@@Application form',
                ],
                [
                    'name' => 'Certified Translation',
                    'desc' => 'Official Arabic translation of documents approved by UAE authorities.',
                    'docs' => 'Original documents@@@Educational certificates@@@Passport & Emirates ID@@@Business documents@@@Immigration & visa documents',
                ],
            ],
            'icp-smart-services' => [
                [
                    'name' => 'Visa Entry Permit Issuance',
                    'desc' => 'Issuing an entry permit for residency, visit, or employment.',
                    'docs' => 'Passport copy@@@Applicant photo@@@Sponsor’s documents',
                ],
                [
                    'name' => 'Visa Renewal',
                    'desc' => 'Renewal of residence visas through the ICP portal.',
                    'docs' => 'Passport@@@Current visa@@@Emirates ID@@@Medical fitness certificate',
                ],
                [
                    'name' => 'Visa Cancellation',
                    'desc' => 'Cancelling residence visas via the ICP system.',
                    'docs' => 'Passport@@@Visa copy@@@Emirates ID',
                ],
                [
                    'name' => 'Emirates ID Application',
                    'desc' => 'New, renewal, or replacement Emirates ID requests.',
                    'docs' => 'Passport@@@Visa or entry permit@@@Applicant photo',
                ],
                [
                    'name' => 'Family Visa Services',
                    'desc' => 'Applying, renewing, or cancelling family residence visas.',
                    'docs' => 'Sponsor’s documents@@@Relationship proof@@@Passport copies@@@Ejari tenancy contract',
                ],
                [
                    'name' => 'Fines Inquiry & Payment',
                    'desc' => 'Checking and paying ICP fines for overstay or visa violations.',
                    'docs' => 'Passport or Emirates ID',
                ],
                [
                    'name' => 'Status Change Application',
                    'desc' => 'Changing visa type or status without exiting the UAE.',
                    'docs' => 'Passport@@@Current visa or entry permit',
                ],
            ],
            'pro-services'       => [
                [
                    'name' => 'Visa Processing for Employees',
                    'desc' => 'Handling employee visas from application to stamping.',
                    'docs' => 'Passport copies@@@Photos@@@Job offer letter@@@Trade license@@@Establishment card',
                ],

                [
                    'name' => 'License Renewal Assistance',
                    'desc' => 'Renewal of trade licenses through DED or Free Zone.',
                    'docs' => 'Current license@@@Ejari contract@@@Passport copies',
                ],

                [
                    'name' => 'Document Clearing',
                    'desc' => 'Processing approvals from government departments.',
                    'docs' => 'Relevant original documents@@@ID copies',
                ],

                [
                    'name' => 'Immigration & Labor Card Processing',
                    'desc' => 'Applying or renewing immigration establishment cards and labor cards.',
                    'docs' => 'Trade license@@@Passport copies@@@Establishment card',
                ],

                [
                    'name' => 'Corporate Bank Account Assistance',
                    'desc' => 'Liaising with banks to open corporate accounts.',
                    'docs' => 'Trade license@@@MOA@@@Passport copies@@@Business plan (if required)',
                ],
            ],
        ];
    }
}
