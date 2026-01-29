<?php
namespace Database\Seeders;

use App\Models\CenterService;
use App\Models\DocumentGroup;
use Illuminate\Database\Seeder;

class DocumentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data1 = [
            "emirates-id"           => [
                "Renew / New Emirates ID"                                  => [
                    'notes' => 'One Photo With White Background(Required Only For Child Below 15 Years Old)@@@For New Born Baby – Birth Certificate(Original)',
                    'docs'  => 'Applicant OriginalPassport@@@Applicant Visacopy@@@Sponsor VisaCopy',
                ],
                "Emirates ID Replacement"                                  => [
                    'notes' => 'One Photo With White Background(Required Only For Child Below 15 Years Old)',
                    'docs'  => "Applicant OriginalPassport@@@Applicant Visacopy",
                ],
                "Mobile Number Update"                                     => [
                    'docs' => "Applicant OriginalPassport@@@Applicant Visacopy@@@Applicant EmiratesIDCopy",
                ],
                "Renew / New Emirates ID UAE National"                     => [
                    'notes' => 'One Photo with White Background (Required Only for Child Below 15 Years Old)@@@Father Emirates ID front and back (Required Only for Child Below 15 Years Old).@@@Registration details required from Emirates Identity Authority (Required only for New Born Baby - UAE National)',
                    'docs'  => "Applicant UAEPassport(Original)@@@Family BookCopy@@@Old EmiratesID(Required OnlyforRenewal)",
                ],
                "Renew / New Emirates ID GCC National (Employee)"          => [
                    'docs' => "Applicant GCCPassport(Original)@@@ID fromGCCCountry@@@Employment Contract@@@Employee UIDNumberfromImmigration",
                ],
                "Renew / New Emirates ID GCC National (Employee-Family)"   => [
                    'docs' => "Proof of Kinship (Birth Certificate, the country Family book equivalent document, Marriage Certificate, Proof ofratios, proof of dependency . Should be issued from outside UAE and Officially attested)@@@Applicant GCC Passport (Original)@@@GCC ID for Applicant or Applicant father@@@Employment Contract@@@Applicant UID Number from Immigration@@@Employee Emirates ID Card",
                ],
                "Renew / New Emirates ID GCC National (Partner)"           => [
                    'docs' => "Applicant GCC Passport (Original)@@@ID from GCC Country@@@Applicant UID Number from Immigration@@@Company License Copy@@@Memorandum Copy",
                ],
                "Renew / New Emirates ID GCC National (Partner-Family)"    => [
                    'docs' => "Proof of Kinship (Birth Certificate, the country Family book equivalent document, Marriage Certificate, Proof ofratios, proof of dependency . Should be issued from outside UAE and Officially attested)@@@Applicant GCC Passport (Original)@@@GCC ID for Applicant or Applicant father@@@Applicant UID Number from Immigration@@@Company License Copy@@@Memorandum Copy@@@Partner Emirates ID",
                ],
                "Renew / New Emirates ID GCC National (Real Estate Owner)" => [
                    'docs' => "Applicant GCC Passport (Original)@@@ID from GCC Country@@@Applicant UID Number from Immigration@@@Title Deed",
                ],
            ],
            'absconding'            => [
                'general' => [
                    'docs' => "Sponsor Emirates ID (Original)@@@Employee passport copy@@@VISA Copy@@@Immigration card copy@@@Company License copy@@@Absconding Labour Approval@@@Applicant Passport Copy@@@Company Bank Account IBAN Number (AE xxxx xxxxxxxxx)",
                ],
            ],
            'change-nationality'    => [
                'general' => [
                    'docs' => "Old Passport@@@New Passport@@@Visa copy@@@Applicant Photo With White Background@@@Sponsor Emirates ID (Original)@@@Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)",
                ],
            ],
            'change-profession'     => [
                'general' => [
                    'docs' => "New Labour Card No@@@Company License Copy@@@Immigration Card Copy@@@Emirates ID of Sponsor Original@@@Applicant passport@@@Applicant Visa@@@Applicant One photo with white background@@@Company Bank Account IBAN number (AE xxxx xxxxxxxxx)",
                ],
            ],
            'change-status'         => [
                'general' => [
                    'docs' => "Sponsor Passport Copy@@@Sponsor Visa Copy@@@Sponsor Original Emirates ID@@@Applicant Visa copy@@@Applicant Passport copy@@@Photograph",
                ],
            ],
            'entry-permit'          => [
                'general' => [
                    'docs' => "Sponsor’s passport color copy.@@@Sponsor’s Visa color copy.@@@Emirates ID Sponsor (Original).@@@Electricity Bill.@@@Sponsor’s Labor Contract for 2 years visa. (If 3 years visa salary certificate is required-FZCO).@@@Sponsor Bank Account IBAN number (AE xxxx xxxxxxxxx).@@@Marriage / Birth Certificate Attested from Ministry of foreign Affairs (MoFA).@@@Applicant Photo with white background.@@@Applicant passport color copy.@@@National ID Card Copy (Only for Pakistan Nationality).@@@No Marriage Certificate (If the daughter is over than 18 years old).@@@If the wife sponsored the children, a non-objection certificate issued from the father or custody proof must be attached (duly certified).@@@Affidavit from Consulate or Embassy.@@@AED 2561 Bank Guarantee for each parent should be deposited at Immigration through Amer centre.@@@Bank Statement of 3 months.@@@Memorandum.@@@Company License Copy.@@@AED 1500 Deposit required (If sponsor is Partner / Investor).",
                ],
            ],
            'establishment-card'    => [
                'general' => [
                    'docs' => "Sponsor Emirates ID (Original)@@@Applicant Passport copy@@@Visa Copy@@@Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)",
                ],
            ],
            'medical-insurance'     => [
                'general' => [
                    'docs' => "Original Passport@@@Visa Copy@@@Photograph",
                ],
            ],
            'pro-card-registration' => [
                'general' => [
                    'docs' => "Sponsor Emirates ID (Original)@@@Applicant Passport copy@@@Visa Copy@@@Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)",
                ],
            ],
            'sponsorship-transfer'  => [
                'general' => [
                    'docs' => "Sponsor Emirates ID (Original)@@@Applicant Passport copy@@@Visa Copy@@@Sponsor Bank Account IBAN Number (AE xxxx xxxxxxxxx)",
                ],
            ],
            'residency-new-renew'   => [
                'general' => [
                    'docs' => "Emirates ID Application@@@Sponsor Emirates ID (Original)@@@Sponsor Bank Account IBAN number (AE xxxx xxxxxxxxx)@@@Medical Result (The age below 18 years not required medical)@@@Medical Insurance Application or card (applicant)@@@One Photo with White Background@@@Applicant Passport@@@Applicant Visa@@@Sponsor Passport copy@@@Sponsor Visa Copy@@@Tenancy Contract / Ejari and Electricity bill@@@Sponsor’s Labor Contract for 2 years visa. (If 3 years visa salary certificate is required-FZCO)@@@No Marriage Certificate (If the daughter is over than 18 years old)@@@Memorandum@@@Company License Copy",
                ],
            ],
            'immigration-gdrfa'     => [
                'general' => [
                    'docs' => "Passport@@@Entry permit/visa details@@@Establishment card (for company services)",
                ],
            ],

            'abu-dhabi-free-zone'   => [
                'general' => [
                    'docs' => "Company Application Form@@@Passport copies of the shareholders@@@Passport-size photographs with white background@@@2-3 suggested names for the new company@@@Specifications of the business activity@@@Number of visas required@@@2 x Proofs of Address (dated within three months)@@@Bank or Professional Reference Letter@@@Curriculum Vitae (summary of professional history) for freelance license",
                ],
            ],
            'trade-license-renewal' => [
                'general' => [
                    'docs' => "Completed BR/1 application form@@@Tenancy contract or Ejari Certificate with at least 1-month validity@@@Current trade license copy@@@Passport, visa, and Emirates ID copies of the business owner",
                ],
            ],

            'maid-visa'             => [
                'general' => [
                    'docs' => "Domestic’s passport@@@Medical fitness@@@Sponsor's documents@@@NOC@@@Accommodation proof",
                ],
            ],
            'golden-visa'           => [
                'general' => [
                    'docs' => "Copy of valid passport@@@ICP nomination approval for Golden Visa@@@Attested certificates@@@Passport-sized photo with white background",
                ],
            ],
            'family-visa-dubai'     => [
                'general' => [
                    'notes' => "Colored copies of passports for all family members.@@@Passport-size photographs with a white background (around 15 copies).@@@Original Emirates ID.@@@Attested by the issuing authority, UAE Embassy, and sponsor’s home country. Arabian Business Center assists with attestations .@@@Attested by the issuing authority, UAE Embassy, and UAE Ministry of Foreign Affairs. Attestation services are also available@@@Required for sponsoring parents@@@Meeting the minimum salary requirement of AED 4,000 or AED 3,000 plus housing. This can be printed at any TASHEEL Center.@@@Required for government employees and individuals in Free Zones.@@@Stamped and signed bank statements covering the last three months (applicable while sponsoring parents).@@@An Arabic letter confirming unmarried status for females above 18 years.",
                    'docs'  => "Passports@@@Photos@@@Sponsor’s Documents@@@Marriage Certificate@@@Birth Certificate@@@EJARI Certificate@@@MOL Contract@@@Salary Certificate@@@IBAN and Bank Statement@@@Confirmation Letter",
                ],
            ],
            'new-born-baby-visa'    => [
                'general' => [
                    'docs' => "Sponsor Passport (Original)@@@Emirates ID of Sponsor (Original)@@@Sponsor Visa Copy@@@Birth certificate (original) in Arabic@@@Baby Clear photo with white background@@@Baby passport@@@Baby Emirates ID Application form@@@Tenancy Contract / Ejari (if living in DUBAI)@@@Electricity Bill@@@Sponsor’s Labor Contract For 2 Years Visa . (if 3 Years Visa Salary Certificate Is Required - FZCO)@@@Mother passportcopy@@@Mother VISAcopy@@@Sponsor BankAccountIBANnumber(AE xxxxxxxxxxxxx)@@@Medical Insurance@@@Memorandum@@@Company LicenseCopy",
                ],
            ],
            'uae-visit-visa'        => [
                'general' => [
                    'docs' => "Passport Front & Back copy@@@White BackgroundPhotograph",
                ],
            ],
            'visa-cancellation'     => [
                'general' => [
                    'docs' => "Emirates ID of Sponsor (Original)@@@Passport copy of the Sponsor@@@Visa copy of the Sponsor@@@Sponsor Bank Account IBAN number (AE xxxxxxxxxxxxx)@@@Family Passport copy@@@Family Visa copy",
                ],
            ],
            'visa-renewal'          => [
                'general' => [
                    'docs' => "Current passport@@@Existing visa@@@Emirates ID@@@Medical fitness certificate (if required)@@@Valid health insurance",
                ],
            ],
            'visa-extension'        => [
                'general' => [
                    'docs' => "Sponsor Emirates ID (Original)@@@Applicant Passport copy@@@Visa Copy@@@Sponsor Bank Account IBAN Number (AE xxxxxxxxxxxxx)",
                ],
            ],
            'work-visa'             => [
                'general' => [
                    'docs' => "Valid passport (minimum 6 months validity)@@@Job offer letter/contract from a licensed UAE employer@@@Passport-sized photographs (with white background)@@@Educational and professional credentials (attested)@@@Medical fitness certificate (post-arrival in UAE)@@@Emirates ID application@@@Employer’s trade license copy ◀",
                ],
            ],
        ];

        $data = [
            "emirates-id" => [
                "Renew / New Emirates ID"                                  => [
                    'notes' => 'One Photo With White Background (Required Only For Child Below 15 Years Old). For New Born Baby – Birth Certificate (Original)',
                    'docs'  => 'Applicant Original Passport@@@Applicant Visa copy@@@Sponsor Visa Copy',
                ],
                "Emirates ID Replacement"                                  => [
                    'notes' => 'One Photo With White Background (Required Only For Child Below 15 Years Old)',
                    'docs'  => "Applicant Original Passport@@@Applicant Visa copy",
                ],
                "Mobile Number Update"                                     => [
                    'docs' => "Applicant Original Passport@@@Applicant Visa copy@@@Applicant Emirates ID Copy",
                ],
                "Renew / New Emirates ID UAE National"                     => [
                    'notes' => 'One Photo with White Background (Required Only for Child Below 15 Years Old). Father Emirates ID front and back (Required Only for Child Below 15 Years Old). Registration details required from Emirates Identity Authority (Required only for New Born Baby - UAE National)',
                    'docs'  => "Applicant UAE Passport (Original)@@@Family Book Copy@@@Old Emirates ID (Required Only for Renewal)",
                ],
                "Renew / New Emirates ID GCC National (Employee)"          => [
                    'docs' => "Applicant GCC Passport (Original)@@@ID from GCC Country@@@Employment Contract@@@Employee UID Number from Immigration",
                ],
                "Renew / New Emirates ID GCC National (Employee-Family)"   => [
                    'docs' => "Proof of Kinship (Birth Certificate, the country Family book equivalent document, Marriage Certificate, Proof ofratios, proof of dependency . Should be issued from outside UAE and Officially attested)@@@Applicant GCC Passport (Original)@@@GCC ID for Applicant or Applicant father@@@Employment Contract@@@Applicant UID Number from Immigration@@@Employee Emirates ID Card",
                ],
                "Renew / New Emirates ID GCC National (Partner)"           => [
                    'docs' => "Applicant GCC Passport (Original)@@@ID from GCC Country@@@Applicant UID Number from Immigration@@@Company License Copy@@@Memorandum Copy",
                ],
                "Renew / New Emirates ID GCC National (Partner-Family)"    => [
                    'docs' => "Proof of Kinship (Birth Certificate, the country Family book equivalent document, Marriage Certificate, Proof ofratios, proof of dependency . Should be issued from outside UAE and Officially attested)@@@Applicant GCC Passport (Original)@@@GCC ID for Applicant or Applicant father@@@Applicant UID Number from Immigration@@@Company License Copy@@@Memorandum Copy@@@Partner Emirates ID",
                ],
                "Renew / New Emirates ID GCC National (Real Estate Owner)" => [
                    'docs' => "Applicant GCC Passport (Original)@@@ID from GCC Country@@@Applicant UID Number from Immigration@@@Title Deed",
                ],
            ],
        ];

        foreach ($data as $key => $item) {
            $service = CenterService::where("slug", $key)->first();
            if (! $service) {
                continue;
            }

            foreach ($item as $k => $value) {
                $dg = DocumentGroup::create([
                    'center_service_id' => $service->id,
                    'name'              => $k,
                    'notes'             => $value['notes'] ?? null,
                ]);

                $docs = explode('@@@', $value['docs'] ?? '');

                foreach ($docs as $doc) {
                    $dg->documents()->create(['center_service_id' => $service->id, 'name' => $doc]);
                }
            }
        }
    }
}
