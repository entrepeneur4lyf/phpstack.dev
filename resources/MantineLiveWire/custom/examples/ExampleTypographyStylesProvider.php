<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTypographyStylesProvider extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage with HTML content -->
                <div>
                    <x-mantine-typography-styles-provider>
                        <div>
                            <h1>Heading 1</h1>
                            <h2>Heading 2</h2>
                            <h3>Heading 3</h3>
                            <h4>Heading 4</h4>
                            <h5>Heading 5</h5>
                            <h6>Heading 6</h6>

                            <hr>

                            <p>
                                <a href="https://mantine.dev">Mantine link</a>
                            </p>

                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident omnis
                                laudantium itaque quisquam est, magnam harum, cum molestias necessitatibus
                                obcaecati quod esse debitis velit nemo dolores deserunt. Quia, iure doloremque.
                            </p>

                            <img
                                src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-10.png"
                                alt="Unsplash image"
                            >

                            <ul>
                                <li>list item - 1</li>
                                <li>list item - 2</li>
                                <li>list item - 3</li>
                                <li>list item - 4</li>
                            </ul>

                            <ol>
                                <li>list item - 1</li>
                                <li>list item - 2</li>
                                <li>list item - 3</li>
                                <li>list item - 4</li>
                            </ol>

                            <blockquote>
                                Life is like an npm install – you never know what you are going to get.
                                – Forrest Gump
                            </blockquote>

                            <p>
                                This is <code>code</code>, <kbd>kbd</kbd> and <mark>mark</mark> inside paragraph
                            </p>

                            <pre>
                                import { Avatar } from '@mantine/core';
                                import image from './image.png';

                                export function AvatarDemo() {
                                    return <Avatar src={image} alt="it's me" />;
                                }
                            </pre>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Element position</th>
                                        <th>Element name</th>
                                        <th>Symbol</th>
                                        <th>Atomic mass</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>6</td>
                                        <td>Carbon</td>
                                        <td>C</td>
                                        <td>12.011</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Nitrogen</td>
                                        <td>N</td>
                                        <td>14.007</td>
                                    </tr>
                                    <tr>
                                        <td>39</td>
                                        <td>Yttrium</td>
                                        <td>Y</td>
                                        <td>88.906</td>
                                    </tr>
                                    <tr>
                                        <td>56</td>
                                        <td>Barium</td>
                                        <td>Ba</td>
                                        <td>137.33</td>
                                    </tr>
                                    <tr>
                                        <td>58</td>
                                        <td>Cerium</td>
                                        <td>Ce</td>
                                        <td>140.12</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </x-mantine-typography-styles-provider>
                </div>

                <!-- With custom styles -->
                <div class="mt-8">
                    <x-mantine-typography-styles-provider
                        :styles="[
                            'root' => [
                                'backgroundColor' => 'var(--mantine-color-gray-0)',
                                'padding' => '20px',
                                'borderRadius' => 'var(--mantine-radius-md)',
                            ],
                            'h1' => [
                                'color' => 'var(--mantine-color-blue-6)',
                            ],
                            'a' => [
                                'textDecoration' => 'none',
                                '&:hover' => [
                                    'textDecoration' => 'underline',
                                ],
                            ],
                        ]"
                    >
                        <div>
                            <h1>Styled heading</h1>
                            <p>
                                This is a paragraph with a <a href="#">styled link</a>.
                                The entire content has a light gray background with rounded corners.
                            </p>
                        </div>
                    </x-mantine-typography-styles-provider>
                </div>

                <!-- With article content -->
                <div class="mt-8">
                    <x-mantine-typography-styles-provider>
                        <article>
                            <h1>Example article</h1>
                            <p>
                                This is example article from
                                <a href="https://css-tricks.com/your-team-is-not-them/">CSS-Tricks website</a>
                                written by
                                <a href="https://css-tricks.com/author/sdrasner/">Sarah Drasner</a>.
                            </p>

                            <h2>Article itself</h2>
                            <p>
                                Let's talk for a moment about how we talk about our teams. This might not
                                seem like something that needs a whole article dedicated to it, but it's
                                actually quite crucial. The way that we refer to our teams sends signals:
                                to stakeholders, to your peers, to the team itself, and even to ourselves.
                                In addressing how we speak about our teams, we'll also talk about accountability.
                            </p>

                            <h3>Your team is "we"</h3>
                            <p>
                                There can be a perception that as a manager of an organization you are in
                                control at all times. Part of that control can invariably be perceived as
                                how you appear to be in charge, are competent, or how you personally perform.
                            </p>
                        </article>
                    </x-mantine-typography-styles-provider>
                </div>
            </div>
        blade;
    }
}
