<?php
namespace Database\Seeders;

use App\Models\CenterService;
use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CenterServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'menu_id'              => 2,
                'government_center_id' => null,
                'name'                 => 'Change Profession',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => null,
                'name'                 => 'Absconding',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => null,
                'name'                 => 'Change Nationality',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => null,
                'name'                 => 'Establishment Card',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => null,
                'name'                 => 'PRO Card Registration',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => null,
                'name'                 => 'Work Visa',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => null,
                'name'                 => 'New Born Baby Visa',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => null,
                'name'                 => 'Visa Extension',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Entry Permit',
                'tagline'              => 'Apply for entry permits and residence visas for family members (spouse, children, parents).',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Status Change',
                'tagline'              => 'Change visa status without exiting the country.',
                'notes'                => 'Required Only For Visa Change Inside UAE Without Exiting The Country',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Sponsorship Transfer',
                'tagline'              => 'Transfer visa sponsorship from one employer to another.',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Emirates ID',
                'tagline'              => 'Typing and submission of Emirates ID applications.',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Medical Insurance',
                'tagline'              => 'Application for medical tests required for visa processing.',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Residency - (New / Renew)',
                'tagline'              => 'Stamping of residence permit in passport after visa approval.',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Immigration (GDRFA)',
                'tagline'              => 'GDRFA services including entry permits, file opening, and establishment card renewals.',
            ],
            [
                'menu_id'              => 2,
                'government_center_id' => 1,
                'name'                 => 'Fines Payment',
                'tagline'              => 'Inquiry and payment of overstay or visa-related fines.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'Family Visa Dubai',
                'tagline'              => 'Sponsor spouse, children, or parents for residency in Dubai.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'UAE Visit Visa',
                'tagline'              => 'Short-term entry permit for visitors to the UAE.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'New Visa',
                'tagline'              => 'Apply for entry permits and residence visas for family members, employees, or domestic workers.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'Visa Renewal',
                'tagline'              => 'Renew residence visas for dependents, employees, or domestic staff.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'Visa Cancellation',
                'tagline'              => 'Cancel visas for dependents or employees when leaving UAE or changing sponsorship.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'MAID VISA',
                'tagline'              => 'Apply for domestic worker visas and residence permits.',
            ],
            [
                'menu_id'              => 4,
                'government_center_id' => 1,
                'name'                 => 'Golden Visa',
                'tagline'              => 'Long-term residency visa (5 or 10 years) for eligible categories in the UAE.',
            ],
            [
                'menu_id'              => null,
                'government_center_id' => 1,
                'name'                 => 'Corporate PRO Services',
                'tagline'              => 'Immigration and PRO support services for companies.',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Trade License Renewal',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Trade Name Reservation',
                'tagline'              => 'Reserve a unique trade name for a new business before starting the licensing process.',
                'docs'                 => 'Passport copy of owner/partners@@@Proposed trade names@@@Initial approval form',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Initial Approval',
                'tagline'              => 'Obtain official permission to proceed with the company licensing process.',
                'docs'                 => 'Passport copies@@@Trade name reservation certificate@@@Business activity details',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Business License Issuance',
                'tagline'              => 'Issue a new trade license for commercial, professional, or industrial activities.',
                'docs'                 => 'Initial approval@@@Tenancy (Ejari) contract@@@MOA (if applicable)@@@Passport copies of shareholders',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Business License Renewal',
                'tagline'              => 'Renew an existing trade license to legally continue business operations.',
                'docs'                 => 'Current trade license@@@Tenancy (Ejari) contract@@@Passport copies',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Modification of License',
                'tagline'              => 'Update license details such as activities, partners, or company information.',
                'docs'                 => 'Current license@@@Amendment forms@@@Required approvals@@@Supporting documents (MOA, passports)',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'License Cancellation',
                'tagline'              => 'Officially cancel a business license and close company records.',
                'docs'                 => 'Current license@@@Clearance from authorities (labor/immigration)@@@Passport copies',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Issue of Branch License',
                'tagline'              => 'Register a branch of a local or foreign company in Dubai.',
                'docs'                 => 'Parent company documents@@@Board resolution@@@MOA@@@Trade license copy@@@Passport copies',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Activity Addition Approval',
                'tagline'              => 'Get approval to add new business activities to an existing license.',
                'docs'                 => 'Current trade license@@@Activity list@@@Supporting approvals (if regulated activity)',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Instant License Service',
                'tagline'              => 'Obtain an instant business license without office space, valid for one year.',
                'docs'                 => 'Passport copies@@@Trade name reservation@@@E-signature (if applicable)',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Commercial Permits',
                'tagline'              => 'Issue permits for events, promotions, signage, and commercial activities.',
                'docs'                 => 'Passport or trade license@@@Event details@@@Location details@@@Design or layout approvals (if required)',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Regulatory Approvals',
                'tagline'              => 'Coordinate approvals from relevant Dubai authorities for regulated activities.',
                'docs'                 => 'Documents depend on activity type (health, food, tourism, etc.)',
            ],
            [
                'menu_id'              => 3,
                'government_center_id' => 5,
                'name'                 => 'Tourism License Services (DET)',
                'tagline'              => 'Issue or renew licenses for travel agencies, tour operators, and tourism businesses.',
                'docs'                 => 'Tourism license application@@@Trade name reservation@@@Tenancy contract@@@Insurance@@@Qualification certificates (if required)',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'New Employment Contract Typing',
                'tagline'              => 'Typing and submission of Ministry of Labor employment contracts for newly hired employees.',
                'docs'                 => 'Passport copy@@@Visa / Entry permit@@@Offer letter',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'Labor Card Application',
                'tagline'              => 'Issuing a labor card for newly employed staff as per Ministry of Labor requirements.',
                'docs'                 => 'Passport@@@Visa@@@Photograph@@@Signed employment contract',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'Labor Card Renewal',
                'tagline'              => 'Renewal of expired or expiring labor cards to ensure continued legal employment.',
                'docs'                 => 'Passport@@@Current labor card@@@Valid visa@@@Photograph',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'Work Permit Application',
                'tagline'              => 'Issuing a new work permit for employees inside or outside the UAE.',
                'docs'                 => 'Passport@@@Visa / Entry permit@@@Medical fitness certificate@@@Photograph',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'Work Permit Renewal',
                'tagline'              => 'Renewing an existing work permit before its expiry date.',
                'docs'                 => 'Passport@@@Current work permit@@@Valid visa',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'Work Permit Cancellation',
                'tagline'              => 'Cancellation of an employee’s work permit when leaving or changing employment.',
                'docs'                 => 'Passport copy@@@Labor card@@@Visa copy@@@Cancellation form',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'Salary Transfer (WPS) Registration',
                'tagline'              => 'Registering companies under the Wage Protection System (WPS) for salary compliance.',
                'docs'                 => 'Trade license@@@Establishment card@@@Passport of owner or manager',
            ],
            [

                'menu_id'              => 2,
                'government_center_id' => 2,
                'name'                 => 'PRO / Labor Office Transactions',
                'tagline'              => 'Handling general Ministry of Labor applications, updates, and official transactions.',
                'docs'                 => 'Relevant company and employee documents as per service',
            ],
            [
                'menu_id'              => null,
                'government_center_id' => 6,
                'name'                 => 'Ejari Registration',
                'tagline'              => 'Register a new tenancy contract through the official Ejari system to validate your rental agreement.',
                'docs'                 => 'Signed tenancy contract@@@Emirates ID copy@@@Passport copy with valid visa page@@@DEWA green bill or account number@@@Property title deed copy',
            ],
            [
                'menu_id'              => null,
                'government_center_id' => 6,
                'name'                 => 'Ejari Renewal',
                'tagline'              => 'Renew your Ejari annually or when contract details change to avoid fines and service disruptions.',
                'docs'                 => 'Signed tenancy contract@@@Emirates ID copy@@@Passport copy with valid visa page@@@DEWA green bill or account number@@@Property title deed copy',
            ],
            [
                'menu_id'              => null,
                'government_center_id' => 6,
                'name'                 => 'Ejari Cancellation',
                'tagline'              => 'Cancel an existing Ejari contract when vacating a property or terminating the tenancy.',
                'docs'                 => 'Existing Ejari certificate@@@Final DEWA bill or clearance@@@Landlord NOC@@@Power of Attorney (if applicable)',
            ],
            [
                'menu_id'              => null,
                'government_center_id' => 6,
                'name'                 => 'Ejari Verification & Certificate',
                'tagline'              => 'Verify Ejari registration and obtain the official certificate for utilities, visas, or business licensing.',
                'docs'                 => 'Ejari contract number or certificate@@@Emirates ID copy@@@Passport copy with valid visa page',
            ],
        ];

        foreach ($data as $item) {
            $item['slug'] = str()->slug($item['name']);
            $cs           = CenterService::create(Arr::except($item, ['docs']));

            if (isset($item['docs'])) {
                $docs = explode('@@@', $item['docs']);
                foreach ($docs as $doc) {
                    Document::create(['center_service_id' => $cs->id, 'name' => $doc]);
                }
            }
        }
    }
}
