export function generateAvatarSVG(firstName?: string | null, lastName?: string | null): string {
  const hasName = !!firstName && !!lastName
  const initials = hasName
    ? `${firstName![0]}${lastName![0]}`.toUpperCase()
    : '?'

  const backgroundColor = hasName ? '#388e3c' : '#9e9e9e' // verde ou cinza

  return `
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80">
      <rect width="100%" height="100%" fill="${backgroundColor}" rx="8" />
      <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle"
            fill="#fff" font-size="32" font-family="Arial, sans-serif">
        ${initials}
      </text>
    </svg>
  `.trim()
}
