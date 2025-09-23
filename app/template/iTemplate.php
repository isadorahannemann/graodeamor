<?php
namespace template;

interface ITemplate {
    public function renderList(array $items): string;
    public function renderForm(array $item = []): string;
}
