import React from 'react';
import { Container, Group, Burger, Text, Button } from '@mantine/core';
import { IconArrowRight } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function HeaderSimple() {
  const { appName, mainLinks, cta } = useComponent();
  const [opened, setOpened] = React.useState(false);

  return (
    <Container size="md">
      <div className="flex justify-between items-center h-16">
        <Text fw="bold" size="xl">{appName}</Text>

        {/* Show on desktop, hide on mobile */}
        <Group gap={5} visibleFrom="sm">
          {mainLinks.map((link) => (
            <Button
              key={link.label}
              variant="subtle"
              component="a"
              href={link.href}
            >
              {link.label}
            </Button>
          ))}

          <Button
            component="a"
            href={cta.href}
            rightSection={<IconArrowRight size="1rem" />}
          >
            {cta.label}
          </Button>
        </Group>

        {/* Show on mobile, hide on desktop */}
        <Burger
          opened={opened}
          onClick={() => setOpened((o) => !o)}
          hiddenFrom="sm"
          size="sm"
        />
      </div>

      {/* Mobile menu */}
      {opened && (
        <div className="sm:hidden border-t border-gray-200">
          <div className="py-4 space-y-4">
            {mainLinks.map((link) => (
              <Text
                key={link.label}
                className="block cursor-pointer hover:underline mb-2"
              >
                {link.label}
              </Text>
            ))}

            <div className="border-t border-gray-200 pt-4">
              <Button
                component="a"
                href={cta.href}
                rightSection={<IconArrowRight size="1rem" />}
                fullWidth
              >
                {cta.label}
              </Button>
            </div>
          </div>
        </div>
      )}
    </Container>
  );
}
