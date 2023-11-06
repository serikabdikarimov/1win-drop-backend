<?php

namespace App\Services;

use App\Models\Schema as ModelsSchema;
use Spatie\SchemaOrg\Schema;

class SchemasService
{
    public function create($data, $domainId, $pageId)
    {
        $faqs = array();
         /**
         * Приводим формат faqs в массив нужной структуры
         * @var array
         */
        
        foreach (json_decode($data) as $blocks) {
            if (key($blocks) == 'faqs') {
                foreach ($blocks as $key=>$question) {
                    
                    foreach($question->question as $key=>$item) {
                        $faqs[] = [
                            'question' => $item,
                            'answer' => $question->answer[$key]
                        ];
                    }
                }
                
            }
        }
        
        $localBusiness = Schema::fAQPage()
        ->mainEntity(
            array_map(function($faq) {
                return Schema::question()
                ->name($faq['question'])
                ->acceptedAnswer(Schema::answer()
                ->text($faq['answer']));
            }, $faqs)
        );

        ModelsSchema::create([
            'locale_id' => $domainId,
            'page_id' => $pageId,
            'schema_type' => 'faqs',
            'data' => $localBusiness->toScript()
        ]);

        return $localBusiness->toScript();
    }

    public function update($data, $domainId, $pageId)
    {
        $faqs = array();
         /**
         * Приводим формат faqs в массив нужной структуры
         * @var array
         */

        foreach (json_decode($data) as $blocks) {
            if (key($blocks) == 'faqs') {
                foreach ($blocks as $key=>$question) {
                    foreach($question->question as $key=>$item) {
                        $faqs[] = [
                            'question' => $item,
                            'answer' => $question->answer[$key]
                        ];
                    }
                }
                
            }
        }
        
        $localBusiness = Schema::fAQPage()
        ->mainEntity(
            array_map(function($faq) {
                return Schema::question()
                ->name($faq['question'])
                ->acceptedAnswer(Schema::answer()
                ->text($faq['answer']));
            }, $faqs)
        );

        $schema = ModelsSchema::where(['page_id' => $pageId, 'locale_id' => $domainId, 'schema_type' => 'faqs'])->first();
        
        if (!$schema) {
            return $this->create($data, $domainId, $pageId);
        }
        
        $schema->update([
            'locale_id' => $domainId,
            'page_id' => $pageId,
            'data' => $localBusiness->toScript()
        ]);

        return $localBusiness->toScript();
    }

}