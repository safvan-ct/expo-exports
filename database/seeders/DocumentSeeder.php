<?php
namespace Database\Seeders;

use App\Models\CenterService;
use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nonGroupedDocs = [
            'absconding'             => [
                "Sponsor Emirates ID (Original)"                       => '',
                "Employee passport copy"                               => '',
                "VISA Copy"                                            => '',
                "Immigration card copy"                                => '',
                "Company License copy"                                 => '',
                "Absconding Labour Approval"                           => '',
                "Applicant Passport Copy"                              => '',
                "Company Bank Account IBAN Number (AE xxxx xxxxxxxxx)" => '',
            ],
            'change-nationality'     => [
                "Old Passport"                                         => '',
                "New Passport"                                         => '',
                "Visa copy"                                            => '',
                "Applicant Photo With White Background"                => '',
                "Sponsor Emirates ID (Original)"                       => '',
                "Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)" => '',
            ],
            'change-profession'      => [
                "New Labour Card No"                                   => '',
                "Company License Copy"                                 => '',
                "Immigration Card Copy"                                => '',
                "Emirates ID of Sponsor Original"                      => '',
                "Applicant passport"                                   => '',
                "Applicant Visa"                                       => '',
                "Applicant One photo with white background"            => '',
                "Company Bank Account IBAN number (AE xxxx xxxxxxxxx)" => '',
            ],
            'status-change'          => [
                "Sponsor Passport Copy"        => '',
                "Sponsor Visa Copy"            => '',
                "Sponsor Original Emirates ID" => '',
                "Applicant Visa copy"          => '',
                "Applicant Passport copy"      => '',
                "Photograph"                   => '',
            ],
            'entry-permit'           => [
                "Sponsor’s passport color copy."                                                                                            => "",
                "Sponsor’s Visa color copy."                                                                                                => "",
                "Emirates ID Sponsor (Original)."                                                                                           => "",
                "Electricity Bill."                                                                                                         => "",
                "Sponsor’s Labor Contract for 2 years visa. (If 3 years visa salary certificate is required-FZCO)."                         => "",
                "Sponsor Bank Account IBAN number (AE xxxx xxxxxxxxx)."                                                                     => "",
                "Marriage / Birth Certificate Attested from Ministry of foreign Affairs (MoFA)."                                            => "",
                "Applicant Photo with white background."                                                                                    => "",
                "Applicant passport color copy."                                                                                            => "",
                "National ID Card Copy (Only for Pakistan Nationality)."                                                                    => "Study enrollment certificate (for male children over than 18 years old).",
                "No Marriage Certificate (If the daughter is over than 18 years old)."                                                      => "",
                "Affidavit from Consulate or Embassy."                                                                                      => "",
                "AED 2561 Bank Guarantee for each parent should be deposited at Immigration through Amer centre."                           => "",
                "Bank Statement of 3 months."                                                                                               => "For Partner's Family - (All points are same Except Labor contract).",
                "Memorandum."                                                                                                               => "",
                "Company License Copy."                                                                                                     => "",
                "AED 1500 Deposit required (If sponsor is Partner / Investor)."                                                             => "",
                "If the wife sponsored the children, a non-objection certificate issued from the father or custody proof must be attached." => "For Parents Visa - SALARY MUST BE 20000 AND IF LESS THAN THAT NEED APPROVAL FROM IMMIGRATION (GDRFA-Festival City, Dubai).",
            ],
            'establishment-card'     => [
                "Sponsor Emirates ID (Original)"                       => '',
                "Applicant Passport copy"                              => '',
                "Visa Copy"                                            => '',
                "Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)" => '',
            ],
            'medical-insurance'      => [
                "Original Passport"          => '',
                "Visa Copy"                  => '',
                "Photograph"                 => '',
                "Emirates ID (if available)" => '',
            ],
            'pro-card-registration'  => [
                "Sponsor Emirates ID (Original)"                       => '',
                "Applicant Passport copy"                              => '',
                "Visa Copy"                                            => '',
                "Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)" => '',
            ],
            'sponsorship-transfer'   => [
                "Sponsor Emirates ID (Original)"                       => '',
                "Applicant Passport copy"                              => '',
                "Visa Copy"                                            => '',
                "Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)" => '',
            ],
            'residency-new-renew'    => [
                "Emirates ID Application"                                                                          => '',
                "Sponsor Emirates ID (Original)"                                                                   => '',
                "Sponsor Bank Account IBAN number (AE xxxx xxxxxxxxx)"                                             => '',
                "Medical Result (The age below 18 years not required medical)"                                     => '',
                "Medical Insurance Application or card (applicant)"                                                => '',
                "One Photo with White Background"                                                                  => '',
                "Applicant Passport"                                                                               => '',
                "Applicant Visa"                                                                                   => '',
                "Sponsor Passport copy"                                                                            => '',
                "Sponsor Visa Copy"                                                                                => '',
                "Tenancy Contract / Ejari and Electricity bill"                                                    => '',
                "Sponsor’s Labor Contract for 2 years visa. (If 3 years visa salary certificate is required-FZCO)" => 'Study enrollment certificate (for male children over than 18 years old).',
                "No Marriage Certificate (If the daughter is over than 18 years old)"                              => 'For Partner’s Family – (All points are same Except Labor contract).',
                "Memorandum"                                                                                       => '',
                "Company License Copy"                                                                             => '',
            ],
            'immigration-gdrfa'      => [
                "Passport"                                  => '',
                "Entry permit/visa details"                 => '',
                "Establishment card (for company services)" => '',
            ],

            'abu-dhabi-free-zone'    => [
                "Company Application Form"                                                 => '',
                "Passport copies of the shareholders"                                      => '',
                "Passport-size photographs with white background"                          => '',
                "2-3 suggested names for the new company"                                  => '',
                "Specifications of the business activity"                                  => '',
                "Number of visas required"                                                 => '',
                "2 x Proofs of Address (dated within three months)"                        => '',
                "Bank or Professional Reference Letter"                                    => '',
                "Curriculum Vitae (summary of professional history) for freelance license" => '',
            ],
            'trade-license-renewal'  => [
                "Completed BR/1 application form"                                      => '',
                "Tenancy contract or Ejari Certificate with at least 1-month validity" => '',
                "Current trade license copy"                                           => '',
                "Passport, visa, and Emirates ID copies of the business owner"         => '',
            ],

            'maid-visa'              => [
                "Domestic’s passport" => '',
                "Medical fitness"     => '',
                "Sponsor's documents" => '',
                "NOC"                 => '',
                "Accommodation proof" => '',
            ],
            'golden-visa'            => [
                "Copy of valid passport"                     => '',
                "ICP nomination approval for Golden Visa"    => '',
                "Attested certificates"                      => '',
                "Passport-sized photo with white background" => '',
            ],
            'family-visa-dubai'      => [
                "Passports"               => "Colored copies of passports for all family members.",
                "Photos"                  => "Passport-size photographs with a white background (around 15 copies).",
                "Sponsor's Documents"     => "Original Emirates ID & Passport.",
                "Marriage Certificate"    => "Attested by the issuing authority, UAE Embassy, and sponsor's home country. Arabian Business Center assists with attestations .",
                "Birth Certificate"       => "Attested by the issuing authority, UAE Embassy, and UAE Ministry of Foreign Affairs. Attestation services are also available",
                "EJARI Certificate"       => "Required for sponsoring parents",
                "MOL Contract"            => "Meeting the minimum salary requirement of AED 4,000 or AED 3,000 plus housing. This can be printed at any TASHEEL Center.",
                "Salary Certificate"      => "Required for government employees and individuals in Free Zones.",
                "IBAN and Bank Statement" => "Stamped and signed bank statements covering the last three months (applicable while sponsoring parents).",
                "Confirmation Letter"     => "An Arabic letter confirming unmarried status for females above 18 years.",
            ],
            'new-born-baby-visa'     => [
                "Sponsor Passport (Original)"                                                                         => '',
                "Emirates ID of Sponsor (Original)"                                                                   => '',
                "Sponsor Visa Copy"                                                                                   => '',
                "Birth certificate (original) in Arabic"                                                              => '',
                "Baby Clear photo with white background"                                                              => '',
                "Baby passport"                                                                                       => '',
                "Baby Emirates ID Application form"                                                                   => '',
                "Tenancy Contract / Ejari (if living in DUBAI)"                                                       => '',
                "Electricity Bill"                                                                                    => '',
                "Sponsor’s Labor Contract For 2 Years Visa . (if 3 Years Visa Salary Certificate Is Required - FZCO)" => '',
                "Mother passport copy"                                                                                => '',
                "Mother VISA copy"                                                                                    => '',
                "Sponsor Bank Account IBAN number (AE xxxxxxxxxxxxx) "                                                => '',
                "Medical Insurance"                                                                                   => 'If Wife Sponsored the children, a non-objection certification issued from the father or custody proof must be attached (duly certified). For Partner’s Family – (All Points Are Same Except Labor Contract).',
                "Memorandum"                                                                                          => '',
                "Company License Copy"                                                                                => '',
            ],
            'uae-visit-visa'         => [
                "Passport Front & Back copy"          => '',
                "White Background Photograph"         => '',
                "Confirmed round-trip flight tickets" => '',
                "Bank statement or financial proof"   => '',
            ],
            'visa-cancellation'      => [
                "Applicant passport"                                  => '',
                "Visa cancellation form"                              => '',
                "Emirates ID of Sponsor (Original)"                   => '',
                "Passport copy of the Sponsor"                        => '',
                "Visa copy of the Sponsor"                            => '',
                "Sponsor Bank Account IBAN number (AE xxxxxxxxxxxxx)" => '',
                "Family Passport copy"                                => '',
                "Family Visa copy"                                    => '',
            ],
            'visa-renewal'           => [
                "Current passport"                          => '',
                "Existing visa"                             => '',
                "Emirates ID"                               => '',
                "Medical fitness certificate (if required)" => '',
                "Valid health insurance"                    => '',
            ],
            'visa-extension'         => [
                "Sponsor Emirates ID (Original)"                      => '',
                "Applicant Passport copy"                             => '',
                "Visa Copy"                                           => '',
                "Sponsor Bank Account IBAN Number (AE xxxxxxxxxxxxx)" => '',
            ],
            'work-visa'              => [
                "Valid passport (minimum 6 months validity)"             => '',
                "Job offer letter/contract from a licensed UAE employer" => '',
                "Passport-sized photographs (with white background)"     => '',
                "Educational and professional credentials (attested)"    => '',
                "Medical fitness certificate (post-arrival in UAE)"      => '',
                "Emirates ID application"                                => '',
                "Employer’s trade license copy"                          => '',
            ],
            "new-visa"               => [
                "Applicant passport copy"               => '',
                "Passport-size photo"                   => '',
                "Sponsor passport & Emirates ID"        => '',
                "Ejari tenancy contract"                => '',
                "Salary certificate / labor contract"   => '',
                "Attested marriage / birth certificate" => '',
            ],
            "corporate-pro-services" => [
                "Trade license"            => '',
                "Establishment card"       => '',
                "Employee passport copies" => '',
                "Labor approvals"          => '',
            ],
            "fines-payment"          => [
                'Sponsor passport & UAE residence visa' => '',
                'Sponsor Emirates ID'                   => '',
                'Proof of accommodation'                => '',
                'Health insurance'                      => '',
                'Dependent passport copy'               => '',
                'Medical clearance (18+)'               => '',
                'NOC from father (if applicable)'       => '',
                'Application form'                      => '',
            ],
        ];

        foreach ($nonGroupedDocs as $key => $docs) {
            if (empty($docs)) {
                continue;
            }

            $service = CenterService::where("slug", $key)->first();
            if (! $service) {
                continue;
            }

            foreach ($docs as $k => $value) {
                Document::create([
                    'center_service_id' => $service->id,
                    'name'              => $k,
                    'notes'             => $value,
                ]);
            }
        }
    }
}
