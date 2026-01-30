<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
enum IdeaCateogry: string {
    case WORK = 'work';
    case HEALTH = 'health';
    case BODY = 'body';
    case REALTIONS = 'relations';
    case HOBBY = 'hobby';
    case SKILL = 'skill';
    case OTHER = 'other';
}

class Idea {
    public function __construct (
        public int $id,
        public string $title,
        public string $description,
        public IdeaCateogry $category,
        public IdeaStatus $status,
        public string $created_at    ){}
};

enum IdeaStatus: string {
    case PARKED = 'parked';
    case IN_PROGRESS = 'in_progress';
    case IMPLEMENTED = 'implemented';
    case DROPPED = 'dropped';
}

$ideas = [
    new Idea(
        1,
        'Refactor router.ts',
        'Get rid of no used vars, delete duplicate values, separate helpers to other files',
        IdeaCateogry::WORK,
        IdeaStatus::PARKED,
        '2026-01-19 09:00:00'
    ),
    new Idea(
        2,
        'Hang out for a pizza',
        'Take family yo yhe Pizzeria pod lasem',
        IdeaCateogry::REALTIONS,
        IdeaStatus::IMPLEMENTED,
        '2026-01-21 09:00:00'
    ),
    new Idea(
        3,
        'Finish Gothic 2 as Fire Wizard',
        'Go to the temple and choose mage as a guild',
        IdeaCateogry::HOBBY,
        IdeaStatus::PARKED,
        '2026-01-31 11:00:00'
    ),
      new Idea(
        4,
        'Stop drinking alcohol',
        'Get rif of vine evenings',
        IdeaCateogry::HEALTH,
        IdeaStatus::IMPLEMENTED,
        '2026-01-06 07:00:00'
    ),
    new Idea(
        5,
        'Go for fullstack',
        'Get to know laravel basics',
        IdeaCateogry::SKILL,
        IdeaStatus::IN_PROGRESS,
        '2025-11-021 16:21:00'
    )
];

Route::get('/', function ()use ($ideas) {
    return view('index', ['ideas' => $ideas]);
})->name('ideas.index');

Route::get('/ideas/{id}', function ($id) use ($ideas) {
    $idea = collect($ideas)->firstWhere('id', $id);

    if (!$idea) {
         abort(Response::HTTP_NOT_FOUND);
    }
    return view('single', ['idea' => $idea]);
})->name('ideas.single');

Route::fallback(function () {
    return 'Not found';
});
