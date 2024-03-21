<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
<h1>Movie Collections</h1>
<table border="1">
<tr bgcolor="#342c454">
<th>Title</th>
<th>box_office</th>
</tr>
<xsl:for-each select="catalog/cd">
<tr>
<!-- <td><xsl:value-of select="title"/></td> -->
<xsl:choose>
<xsl:when test="box_office > 4">
<td bgcolor="orange">
<xsl:value-of select="title"/>
</td>
<td bgcolor="orange"><xsl:value-of select="box_office"/>
</td>
</xsl:when>
<xsl:otherwise>
<td><xsl:value-of select="title"/></td>
<td><xsl:value-of select="box_office"/></td>
</xsl:otherwise>
</xsl:choose>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>