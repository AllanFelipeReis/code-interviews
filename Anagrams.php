<?php
class GroupAnagrams
{
    private array $words = [];
    private array $anagramsGroup = [];

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    protected function sortWord($word)
    {
        $word = str_split($word);
        sort($word);
        return implode($word);
    }

    protected function hashTable()
    {
        foreach ($this->words as $word) {
            $index = $this->sortWord($word);
            $this->anagramsGroup[$index][] = $word;
        }
    }

    public function group()
    {
        $this->hashTable();
        return array_values($this->anagramsGroup);
    }
}

function groupAnagrams(array $words)
{
    $GroupAnagrams = new GroupAnagrams($words);
    return $GroupAnagrams->group();
}

$words = ['aro', 'carro', 'mais', 'ora', 'teste', 'ocrar', 'sima', 'setet', 'misa', 'roa'];
print_r(groupAnagrams($words));

// input
// $words = ['aro', 'carro', 'mais', 'ora', 'teste', 'ocrar', 'sima', 'setet', 'misa', 'roa'];

// output
// $words = [['aro', 'ora', 'roa'], ['carro', 'ocrar'], ['mais', 'sima', 'misa'], ['teste', 'setet']];