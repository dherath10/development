<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
<html>
<head/>
<body>
<h2>Book Catalogue 2011</h2>
<table border="1">
<tr bgcolor="#9acd32">
<th align="left">ISBN</th>
<th align="left">Title</th>
<th align="left">Author</th>
<th align="left">Bio</th>
<th align="left">Publisher</th>
<th align="left">Book URL</th>
<th align="left">Book Review</th>
</tr>

<xsl:for-each select="Book/book">
<tr>
<td><b>
<xsl:value-of select="@isbn"/>
</b></td>
<td>
<xsl:value-of select="title"/>
</td>
<td>
<ol>
<xsl:for-each select="author">
<li><xsl:value-of select="name/First_name" /><br />
<xsl:value-of select="name/Last_name" /></li>
</xsl:for-each>
</ol>
</td>
<td>
<ol>
<xsl:for-each select="author">
<xsl:value-of select="bio" />
</xsl:for-each>
</ol>
</td>
<td>
<xsl:value-of select="publisher" />
</td>
<td>
<xsl:choose>
<xsl:when test="book_url/@page">
<xsl:element name="a">
<xsl:attribute name="href" />
<xsl:value-of select="book_url/@page" />
</xsl:element>
</xsl:when>
<xsl:otherwise>No URL </xsl:otherwise>
</xsl:choose>
</td>
<td>
<xsl:value-of select="review" />
</td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>