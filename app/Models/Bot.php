<?php

namespace App\Models;

class Bot
{
    public function generateResponse(string $message): string
    {
        $response = $this->generate(
            message: $this->preprocess(
                message: $message
            )
        );

        return $this->postprocess(
            response: $response
        );
    }

    private function preprocess($message): string|array|null
    {
        return preg_replace("/[^a-zA-Z0-9\s]/", "", strtolower($message));
    }

    private function generate($message): string
    {
        $helloPattern = "/^(bonjour|bonsoir|salut|coucou|hey)/i";
        $thankPattern = "/(merci|merci beaucoup|je vous remercie)/i";
        $helpPattern = "/(aidez-moi|pouvez-vous m'aider)/i";
        $infoPattern = "/(qui es-tu|qu'est-ce que c'est|pouvez-vous m'expliquer)/i";
        $likePattern = "/^(j'aime|je n'aime pas|j'adore)/i";
        $presentationPattern = "/^(je m'appelle|je suis|je viens)/i";
        $interestPattern = "/(qu'aimes-tu faire|quel est ton passe-temps)/i";
        $opinionPattern = "/(qu'en penses-tu|tu es d'accord)/i";
        $rdvPattern = "/(veux-tu sortir|on peut se voir)/i";
        $phonePattern = "/(peux-tu me donner ton numéro|tu as un numéro)/i";
        $photoPattern = "/(peux-tu me montrer une photo|tu as une photo)/i";
        $beautyPattern = "/(tu es belle|tu es mignon)/i";
        $profilPattern = "/(j'aime ton profil|ton profil est intéressant)/i";
        $statePattern = "/(qu'est-ce que tu fais|où habites-tu)/i";
        $thank2youPattern = "/(merci pour ta réponse|merci beaucoup)/i";

        if (preg_match($helloPattern, $message)) {
            return collect(["Salut, comment ça va ?", "Bonjour.", "Bonsoir, ça va ?", "Oh salut ! Comment tu vas ?"])->random();
        } else if (preg_match($thankPattern, $message)) {
            return collect(["Mais avec plaisir !", "De rien.", "Merci à toi, tu veux quelque chose ?", "Pas de problème."])->random();
        } else if (preg_match($helpPattern, $message)) {
            return collect(["Oui, qu'est-ce que je peux faire pour toi ?", "C'est possible oui, en quoi je peux t'aider ?"])->random();
        } else if (preg_match($infoPattern, $message)) {
            return collect(["Toutes mes informations sont déjà sur mon profil...", "Tout est sur mon profil, qu'est-ce que tu veux savoir ?"])->random();
        } else if (preg_match($likePattern, $message)) {
            return collect(["C'est écrit sur mon profil !", "Je t'invite à lire mon profil"])->random();
        } else if (preg_match($presentationPattern, $message)) {
            return collect(["C'est écrit sur mon profil.", "En soit c'est écrit sur mon profil, suffit de lire."])->random();
        } else if (preg_match($interestPattern, $message)) {
            return collect(["C'est écrit sur mon profil.", "En soit c'est écrit sur mon profil, suffit de lire."])->random();
        } else if (preg_match($opinionPattern, $message)) {
            return collect(["Ca dépend toujours de quoi on parles, il faut être précis.", "Je ne suis pas difficile."])->random();
        } else if (preg_match($rdvPattern, $message)) {
            return collect(["Actuellement, je n'ai pas encore envie de rencontrer...", "Je préfère parler avec toi d'abord.", "Il faudrait faire encore plus connaissance pour ça."])->random();
        } else if (preg_match($phonePattern, $message)) {
            return collect(["Désolé, je ne donne pas ça...", "Je préfère parler ici ...", "Tu préfères pas parler ici ?"])->random();
        } else if (preg_match($photoPattern, $message)) {
            return collect(["Désolé, j'ai un peu peur de mettre une photo en conversation...", "Tu peux trouver toutes mes photos sur mon profil"])->random();
        } else if (preg_match($beautyPattern, $message)) {
            return collect(["Oh merci !", "C'est gentil, parle pour toi"])->random();
        } else if (preg_match($profilPattern, $message)) {
            return collect(["Merci, je vais regarder un peu le tien", "C'est gentil, le tien est cool aussi", "Merci beaucoup"])->random();
        } else if (preg_match($statePattern, $message)) {
            return collect(["C'est écrit sur mon profil", "Tu peux trouver ça sur mon profil directement"])->random();
        } else if (preg_match($thank2youPattern, $message)) {
            return collect(["De rien", "Avec plaisir !", "Mais de rien, c'est normal"])->random();
        }

        return collect(["Désolé, je n'ai pas compris...", "Je n'ai pas compris, tu peux reformuler ?"])->random();
    }

    public function postprocess($response): string
    {
        return ucfirst($response);
    }
}
