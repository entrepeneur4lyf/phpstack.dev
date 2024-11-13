import React from 'react';
import { Container, Group, Anchor } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function FooterSimple() {
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
      <Container className="flex justify-center py-8">
        <Group gap={16} className="justify-center" wrap="wrap">
          {items}
        </Group>
      </Container>
    </footer>
  );
}
