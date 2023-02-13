<?php

namespace Database\Seeders;

use App\Enums\User\UserGendersEnum;
use App\Enums\User\UserRolesEnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(count: 500)->create(
            attributes: ['fake_account' => true]
        )->each(callback: function ($user) {
            $user->state = $this->getOneStateFromCountry(country: $user->country);
            $user->hair_color = $this->getOneColorForHair();
            $user->eye_color = $this->getOneColorForEye();
            $user->about_me = $this->getAboutMeRandom();
            $user->looking_for = $this->getLookingForInRandomOrder();
            $user->interest_for = $this->getInterestForInRandomOrder();
            $user->last_seen = now();

            if (rand(0, 1) === 1) {
                Cache::put(
                    key: "users_online-" . $user->id,
                    value: true,
                    ttl: Carbon::now()->addMinutes(
                        rand(60, 60 * 5)
                    )
                );
            }

            $user->save();
        });

        User::factory()->create(
            attributes: [
                'name' => 'Night Lovell',
                'gender' => UserGendersEnum::Homme,
                'country' => 'FR',
                'state' => "Champagne-Ardenne",
                'role' => UserRolesEnum::ADMIN,
                'email' => 'aecy@dev.fr'
            ]
        );

        User::factory()->create(
            attributes: [
                'name' => 'Gravos2',
                'gender' => UserGendersEnum::Homme,
                'country' => 'FR',
                'state' => "Champagne-Ardenne",
                'role' => UserRolesEnum::ADMIN,
                'email' => 'gravos2@gmail.com'
            ]
        );
    }

    /**
     * Récupère une province aléatoirement par rapport au pays passé en paramètre.
     *
     * @param string $country
     * @return string
     */
    private function getOneStateFromCountry(string $country): string
    {
        $states = [
            "FR" => [
                "Alsace",
                "Aquitaine",
                "Auvergne",
                "Basse-Normandie",
                "Bourgogne",
                "Bretagne",
                "Centre",
                "Champagne-Ardenne",
                "Corse",
                "Franche-Comté",
                "Haute-Normandie",
                "Île-de-France",
                "Languedoc-Roussillon",
                "Limousin",
                "Lorraine",
                "Midi-Pyrénées",
                "Nord-Pas-de-Calais",
                "Pays de la Loire",
                "Picardie",
                "Poitou-Charentes",
                "Provence-Alpes-Côte d'Azur",
                "Rhône-Alpes",
            ],
            "BE" => [
                'Anvers',
                'Limbourg',
                'Liège',
                'Luxembourg',
                'Namur',
                'Brabant wallon',
                'Brabant flamand',
                'Bruxelles',
                'Hainaut',
                'Flandre orientale',
                'Flandre occidentale',
            ],
        ];

        $regions = $states[$country];
        return $regions[array_rand($regions)];
    }

    /**
     * Récupère aléatoirement une couleur de cheveux.
     *
     * @return string
     */
    private function getOneColorForHair(): string
    {
        return collect([
            "Noir",
            "Brun foncé",
            "Brun",
            "Blond foncé",
            "Blond",
            "Blond clair",
            "Roux",
            "Blanc"
        ])->random();
    }

    /**
     * Récupère aléatoirement une couleur pour les yeux.
     *
     * @return string
     */
    private function getOneColorForEye(): string
    {
        return collect([
            "Marron",
            "Bleu",
            "Vert",
            "Gris",
            "Noisette"
        ])->random();
    }

    /**
     * Récupère aléatoirement des informations sur le "à propos" d'un utilisateur.
     *
     * @return string
     */
    private function getAboutMeRandom(): string
    {
        return collect([
            "Je préfère ne pas évoquer mes informations personnelles.",
            "Je ne me sens pas à l'aise pour discuter de moi.",
            "Je ne suis pas disposé à partager des détails sur ma vie personnelle.",
            "Je ne veux pas m'étendre sur ma vie privée en ce moment.",
            "Je pense que nous devrions nous concentrer sur un autre sujet.",
            "Je suis désolé, mais je préfère ne pas aborder ce sujet.",
            "Cela ne me convient pas de discuter de ma vie privée en ce moment.",
            "Je ne suis pas disposé à répondre à des questions personnelles.",
            "Je n'ai pas l'intention de partager des informations sur moi.",
            "Je ne veux pas m'étendre sur ce sujet pour le moment.",
            "Je préfère ne pas entrer dans les détails sur ma vie personnelle.",
            "Je ne me sens pas à l'aise de discuter de moi-même.",
            "Je préfère que nous changions de sujet.",
            "Je ne suis pas disposé à fournir des informations sur ma vie privée.",
            "Je ne suis pas enclin à partager des détails sur ma vie personnelle en ce moment.",
        ])->random();
    }

    /**
     * Récupère aléatoirement des informations sur ce que l'utilisateur est intéressé par.
     *
     * @return string
     */
    private function getInterestForInRandomOrder(): string
    {
        return collect([
            "Mes intérêts incluent : la lecture, le sport, la cuisine, le voyage, les films.",
            "Je ne suis pas à l'aise pour discuter de mes intérêts en public. Je préfère en parler en privé.",
            "Mes passe-temps sont très variés et je préfère en discuter en message privé pour en dire plus.",
            "Je suis passionné par : l'art, la musique, la nature, la photographie, les rencontres sociales.",
            "Je préfère ne pas dévoiler mes intérêts ici. Si vous souhaitez en savoir plus, n'hésitez pas à m'envoyer un message privé.",
            "J'ai beaucoup de centres d'intérêt, mais je préfère ne pas les partager publiquement pour des raisons de confidentialité.",
            "Mes intérêts sont très importants pour moi et je préfère ne pas les exposer ici. Si vous souhaitez en savoir plus, je serai heureux de discuter avec vous en privé.",
            "Je suis ouvert à de nombreux centres d'intérêt, mais je préfère ne pas les dévoiler ici. Si vous souhaitez en savoir plus, n'hésitez pas à me contacter en privé.",
        ])->random();
    }

    /**
     * Récupère aléatoirement des informations sur ce qu'utilisateur recherche.
     *
     * @return string
     */
    private function getLookingForInRandomOrder(): string
    {
        return collect([
            "Je cherche quelqu'un avec qui je peux construire une relation solide et durable, basée sur la confiance, la communication et le respect mutuel.",
            "J'aimerais rencontrer une personne qui partage mes centres d'intérêt tels que la lecture, le sport, la cuisine et les voyages.",
            "Je suis à la recherche d'une personne qui soit ouverte d'esprit, drôle, attentionnée et qui ait un bon sens de l'aventure.",
            "Je souhaite rencontrer quelqu'un avec qui je puisse partager des moments uniques et inoubliables, tout en découvrant de nouvelles cultures et de nouveaux horizons.",
            "Je recherche une personne qui soit sincère, honnête et qui ait le désir de construire une relation stable et durable.",
            "J'aimerais rencontrer une personne qui soit passionnée par la vie, qui apprécie les petits plaisirs de la vie et qui ait un bon sens de l'humour.",
            "Je suis à la recherche d'une personne avec qui je puisse partager des moments de complicité, de rire et de tendresse.",
            "Je souhaite rencontrer quelqu'un avec qui je puisse construire une relation basée sur la confiance, la compréhension et la complicité.",
            "Je cherche une personne avec qui je peux partager des moments de bonheur, de rire et de détente.",
            "Je suis à la recherche d'une personne qui soit aimante, attentionnée et qui ait un bon sens de l'humour.",
            "Je souhaite rencontrer quelqu'un avec qui je puisse construire une relation basée sur la confiance, la compréhension et la sincérité.",
            "J'aimerais rencontrer une personne qui soit ouverte, curieuse et qui aime découvrir de nouvelles choses.",
            "Je recherche une personne qui soit passionnée, ambitieuse et qui ait un fort désir de construire une relation stable et durable.",
            "Je suis à la recherche d'une personne avec qui je puisse partager des moments intimes, des conversations profondes et des moments de complicité.",
            "Je cherche une personne qui soit attentionnée, compréhensive et qui ait le désir de construire une relation forte et épanouissante.",
            "J'aimerais rencontrer une personne qui soit équilibrée, stable et qui ait un bon sens de la vie.",
            "Je suis à la recherche d'une aventure d'un soir avec quelqu'un qui soit audacieux, aventureux et ouvert d'esprit.",
            "Je cherche une rencontre d'un soir avec une personne qui soit sensuelle, confiante et qui ait un fort désir de vivre des expériences excitantes et passionnantes.",
            "Je suis à la recherche d'un partenaire pour une rencontre d'un soir qui soit spontané, amusant et qui ait le désir de vivre des moments intenses et mémorables.",
            "Je cherche une rencontre d'un soir avec quelqu'un qui soit enjoué, coquin et qui ait un fort désir de vivre des moments de plaisir et de détente.",
            "Je suis à la recherche d'une personne pour une rencontre d'un soir qui soit aventureuse, curieuse et qui ait le désir de vivre des moments excitants et passionnants.",
        ])->random();
    }
}
