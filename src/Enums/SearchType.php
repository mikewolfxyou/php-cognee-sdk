<?php

declare(strict_types=1);

namespace Cognee\Enums;

/**
 * Search type enumeration for Cognee v0.5.1+
 *
 * These values match the Cognee API's expected search_type parameter.
 */
enum SearchType: string
{
    /**
     * Search through document summaries.
     */
    case SUMMARIES = 'SUMMARIES';

    /**
     * Search through raw document chunks.
     */
    case CHUNKS = 'CHUNKS';

    /**
     * Lexical (keyword-based) search through chunks.
     */
    case CHUNKS_LEXICAL = 'CHUNKS_LEXICAL';

    /**
     * RAG (Retrieval-Augmented Generation) completion search.
     */
    case RAG_COMPLETION = 'RAG_COMPLETION';

    /**
     * Search using knowledge graph triplets.
     */
    case TRIPLET_COMPLETION = 'TRIPLET_COMPLETION';

    /**
     * Search using the full knowledge graph.
     */
    case GRAPH_COMPLETION = 'GRAPH_COMPLETION';

    /**
     * Search using graph summaries.
     */
    case GRAPH_SUMMARY_COMPLETION = 'GRAPH_SUMMARY_COMPLETION';

    /**
     * Execute Cypher queries against the graph database.
     */
    case CYPHER = 'CYPHER';

    /**
     * Natural language search interface.
     */
    case NATURAL_LANGUAGE = 'NATURAL_LANGUAGE';

    /**
     * Graph completion with chain-of-thought reasoning.
     */
    case GRAPH_COMPLETION_COT = 'GRAPH_COMPLETION_COT';

    /**
     * Graph completion with extended context.
     */
    case GRAPH_COMPLETION_CONTEXT_EXTENSION = 'GRAPH_COMPLETION_CONTEXT_EXTENSION';

    /**
     * "Feeling lucky" - returns a single best result.
     */
    case FEELING_LUCKY = 'FEELING_LUCKY';

    /**
     * Feedback-based search refinement.
     */
    case FEEDBACK = 'FEEDBACK';

    /**
     * Temporal (time-based) search.
     */
    case TEMPORAL = 'TEMPORAL';

    /**
     * Search through coding rules and patterns.
     */
    case CODING_RULES = 'CODING_RULES';
}
