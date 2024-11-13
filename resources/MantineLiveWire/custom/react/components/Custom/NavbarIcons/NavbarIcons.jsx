import React from 'react';
import { Navbar, Tooltip, UnstyledButton, Stack } from '@mantine/core';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

function NavbarLink({ icon, label, active, onClick }) {
  const IconComponent = Icons[`Icon${icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  return (
    <Tooltip label={label} position="right" transitionProps={{ duration: 0 }}>
      <UnstyledButton
        onClick={() => onClick(label)}
        className={`
          w-12 h-12 rounded-md flex items-center justify-center
          hover:bg-gray-100 cursor-pointer
          ${active ? 'bg-blue-50 text-blue-600' : 'text-gray-700'}
        `}
      >
        <IconComponent size="1.5rem" stroke={1.5} />
      </UnstyledButton>
    </Tooltip>
  );
}

export default function NavbarIcons() {
  const { mainLinks, userLinks } = useComponent();
  const [active, setActive] = React.useState(mainLinks[0]?.label);

  return (
    <Navbar height="100vh" width={{ base: 80 }} p="md">
      <Navbar.Section grow mt={50}>
        <Stack justify="center" spacing={0}>
          {mainLinks.map((link) => (
            <NavbarLink
              key={link.label}
              {...link}
              active={active === link.label}
              onClick={setActive}
            />
          ))}
        </Stack>
      </Navbar.Section>

      <Navbar.Section>
        <Stack justify="center" spacing={0}>
          {userLinks.map((link) => (
            <NavbarLink
              key={link.label}
              {...link}
              active={active === link.label}
              onClick={setActive}
            />
          ))}
        </Stack>
      </Navbar.Section>
    </Navbar>
  );
}
