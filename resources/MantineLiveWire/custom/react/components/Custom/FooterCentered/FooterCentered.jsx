import React from 'react';
import { Container, Group, Anchor, Text } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function FooterCentered() {
  const { links } = useComponent();

  const items = links.map((link) => (
    <Anchor
      key={link.label}
      href={link.href}
      size="sm"
      className="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
    >
      {link.label}
    </Anchor>
  ));

  return (
    <footer className="border-t border-gray-200 dark:border-gray-800">
      <Container className="py-8 flex flex-col items-center">
        <Text size="sm" className="text-gray-600 dark:text-gray-400 mb-4">
          © 2024 MantineLivewire. All rights reserved.
        </Text>

        <Group gap={16} className="justify-center" wrap="wrap">
          {items}
        </Group>
      </Container>
    </footer>
  );
}
