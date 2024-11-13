<?php

namespace MantineLivewire\Components;

/**
 * Tree component for displaying hierarchical data structures.
 *
 * The Tree component allows you to display and interact with nested data structures.
 * It supports expandable nodes, selection, and custom node rendering.
 *
 * @see https://mantine.dev/core/tree/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-tree
 *     :data="[
 *         ['value' => '1', 'label' => 'Root', 'children' => [
 *             ['value' => '2', 'label' => 'Child 1'],
 *             ['value' => '3', 'label' => 'Child 2']
 *         ]]
 *     ]"
 * />
 * ```
 *
 * @example With custom node rendering
 * ```blade
 * <x-mantine-tree
 *     :data="$treeData"
 *     :renderNode="function($node) {
 *         return view('components.tree-node', ['node' => $node]);
 *     }"
 *     :levelOffset="24"
 * />
 * ```
 *
 * @example Interactive tree with selection
 * ```blade
 * <x-mantine-tree
 *     :data="$items"
 *     :expandOnClick="true"
 *     :selectOnClick="true"
 *     :clearSelectionOnOutsideClick="true"
 * />
 * ```
 */
class Tree extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Array of tree items with nested structure
     * @param mixed $tree Tree state object for controlled component
     * @param mixed $renderNode Custom function to render tree nodes
     * @param mixed $levelOffset Offset in px between nested items
     * @param mixed $expandOnClick Expand/collapse node when clicked
     * @param mixed $selectOnClick Select node when clicked
     * @param mixed $clearSelectionOnOutsideClick Clear selection when clicking outside
     * @param mixed $classNames Custom class names for tree elements
     * @param mixed $styles Custom styles for tree elements
     */
    public function __construct(
        public mixed $data = null,
        public mixed $tree = null,
        public mixed $renderNode = null,
        public mixed $levelOffset = null,
        public mixed $expandOnClick = null,
        public mixed $selectOnClick = null,
        public mixed $clearSelectionOnOutsideClick = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'tree' => $tree,
            'renderNode' => $renderNode,
            'levelOffset' => $levelOffset,
            'expandOnClick' => $expandOnClick,
            'selectOnClick' => $selectOnClick,
            'clearSelectionOnOutsideClick' => $clearSelectionOnOutsideClick,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
