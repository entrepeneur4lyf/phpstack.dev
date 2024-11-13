import React from 'react';
import { Container, Group, Burger, Text } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function DoubleHeader() {
  const { appName, mainLinks, userLinks } = useComponent();
  const [opened, setOpened] = React.useState(false);

  return (
    <div>
      <Container size="md">
        <div className="flex justify-between items-center h-14">
          <Text fw="bold" size="xl">{appName}</Text>

          {/* Show on desktop, hide on mobile */}
          <Group gap={5} visibleFrom="sm">
            {userLinks.map((link) => (
              <Text
                key={link.label}
                size="sm"
                className="cursor-pointer hover:underline"
                c="dimmed"
              >
                {link.label}
              </Text>
            ))}
          </Group>

          {/* Show on mobile, hide on desktop */}
          <Burger
            opened={opened}
            onClick={() => setOpened((o) => !o)}
            hiddenFrom="sm"
            size="sm"
          />
        </div>
      </Container>

      {/* Main links - show on desktop, hide on mobile */}
      <div className="border-t border-b border-gray-200 hidden sm:block">
        <Container size="md">
          <div className="flex justify-between items-center h-14">
            <Group gap={5}>
              {mainLinks.map((link) => (
                <Text
                  key={link.label}
                  className="cursor-pointer hover:underline"
                >
                  {link.label}
                </Text>
              ))}
            </Group>
          </div>
        </Container>
      </div>

      {/* Mobile menu */}
      {opened && (
        <div className="sm:hidden border-t border-gray-200">
          <Container size="md">
            <div className="py-4 space-y-4">
              {mainLinks.map((link) => (
                <Text
                  key={link.label}
                  className="block cursor-pointer hover:underline"
                >
                  {link.label}
                </Text>
              ))}
              <div className="border-t border-gray-200 pt-4">
                {userLinks.map((link) => (
                  <Text
                    key={link.label}
                    size="sm"
                    className="block cursor-pointer hover:underline mb-2"
                    c="dimmed"
                  >
                    {link.label}
                  </Text>
                ))}
              </div>
            </div>
          </Container>
        </div>
      )}
    </div>
  );
}
