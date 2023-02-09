<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->data() as $question) {
            Question::create([
                'title' => $question['title'],
                'content' => $question['content']
            ]);
        }
    }

    private function data(): array
    {
        return [
            ['title' => "S'inscrire sur Juste un soir", 'content' => "Vous pouvez vous inscrire uniquement si vous avez plus de 18 ans ; dans le cas contraire. Nous vous invitons à passer votre chemin."],
            ['title' => "Activer votre compte", 'content' => "Vous devez vous inscrire et ensuite valider votre adresse e-mail pour profiter pleinement des fonctionnalités."],
            ['title' => "Oubli de mot de passe", 'content' => "Si vous avez oublié votre mot de passe, pas de problème ! Cliquez ici"],
            ['title' => "Supprimer votre compte", 'content' => "Vous pouvez supprimer définitivement votre compte de Juste un soir, aller sur Mon Compte puis Sécurité et supprimer votre compte en indiquant votre mot de passe actuel."],
            ['title' => "Concernant vos photos", 'content' => "Vos photos sont uniquement disponible sur site, aucun membre a le droit de prendre votre photo pour l'utilisé à des fins personnelles ou commerciales.
Les photos dénudées sont acceptées uniquement si vous avez plus de 18 ans."],
        ];
    }
}
