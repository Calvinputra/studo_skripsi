<?php

namespace App\Imports;

use App\Models\QuestAnswer;
use App\Models\QuestQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;


use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestQuestionImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
    use Importable;

    protected $data;
    protected $id;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->id = 0;
    }

    public function model(array $row)
    {
        $question = QuestQuestion::create([
            'quest_id' =>  $this->data['quest_id'],
            'quest_type' =>  $this->data['quest_type'],
            'question' =>  $row['question'],
            'priority' =>  $row['priority'],
        ]);

        $row_keys = array_keys($row);
        $answers = array_values(preg_grep('/^answer_/i', $row_keys));

        foreach ($answers as $correct => $answer) {
            if ($row[$answer]) {
                QuestAnswer::create([
                    'quest_question_id' => $question->id,
                    'answer' => $row[$answer],
                    'is_correct' => $row['is_correct'] == ($correct + 1) ? 1 : 0,
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'question' =>  'required',
            'priority' =>  'required|integer',
            'is_correct' =>  'required|integer',
            'answer_1' =>  'required',
            'answer_2' =>  'required',
            'answer_3' =>  'required',
            'answer_4' =>  'required',
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
