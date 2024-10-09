<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job\Skills;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsData = [
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'React.js'],
            ['name' => 'Angular'],
            ['name' => 'Node.js'],
            ['name' => 'Python'],
            ['name' => 'Django'],
            ['name' => 'Flask'],
            ['name' => 'Ruby'],
            ['name' => 'Ruby on Rails'],
            ['name' => 'Java'],
            ['name' => 'Spring'],
            ['name' => 'Kotlin'],
            ['name' => 'Android'],
            ['name' => 'Swift'],
            ['name' => 'iOS'],
            ['name' => 'C#'],
            ['name' => 'ASP.NET'],
            ['name' => 'C++'],
            ['name' => 'C'],
            ['name' => 'Objective-C'],
            ['name' => 'Go'],
            ['name' => 'Rust'],
            ['name' => 'Scala'],
            ['name' => 'Haskell'],
            ['name' => 'Perl'],
            ['name' => 'R'],
            ['name' => 'SQL'],
            ['name' => 'NoSQL'],
            ['name' => 'MongoDB'],
            ['name' => 'MySQL'],
            ['name' => 'PostgreSQL'],
            ['name' => 'SQLite'],
            ['name' => 'Redis'],
            ['name' => 'Elasticsearch'],
            ['name' => 'Docker'],
            ['name' => 'Kubernetes'],
            ['name' => 'Jenkins'],
            ['name' => 'Git'],
            ['name' => 'GitHub'],
            ['name' => 'GitLab'],
            ['name' => 'Bitbucket'],
            ['name' => 'AWS'],
            ['name' => 'Azure'],
            ['name' => 'Google Cloud'],
            ['name' => 'Heroku'],
            ['name' => 'DigitalOcean'],
            ['name' => 'Netlify'],
            ['name' => 'Vercel'],
            ['name' => 'Firebase'],
            ['name' => 'Algolia'],
            ['name' => 'Twilio'],
            ['name' => 'Stripe'],
            ['name' => 'PayPal'],
            ['name' => 'Braintree'],
            ['name' => 'Square'],
            ['name' => 'Shopify']


        ];

        foreach ($skillsData as $skill) {
            $totalSkills = Skills::where('name', $skill['name'])->count();
            if ($totalSkills === 0) {
                Skills::create($skill);
            }
        }
    }
}
